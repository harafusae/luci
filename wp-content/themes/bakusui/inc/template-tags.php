<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bakusui
 */

if ( ! function_exists( 'bakusui_posted_on2' ) ) :
	/**
   * [ORIGINAL]カテゴリを記事先頭に表示
   */
function bakusui_posted_on2() {
	// $categories_name = get_the_category( esc_html__( ', ', 'bakusui' ));
$categories_list = get_the_category_list( esc_html__( ', ', 'bakusui' ));
 	 if ( $categories_list && bakusui_categorized_blog() ) {
 	 printf( '<span class="cat-links--head">' . esc_html__( '%1$s', 'bakusui' ) . '</span>', $categories_list ); // WPCS: XSS OK.
 	 }
 	}
endif;

if ( ! function_exists( 'bakusui_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function bakusui_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s更新', 'post date', 'bakusui' ),
		'<span>' . $time_string . '</span>'
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'bakusui' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="col-avatar">' . get_avatar(get_the_author_meta('ID'),32). '</span>';

	echo '<span class="byline"> ' . $byline . '</span> <span class="posted-on">' . $posted_on . '</span> '; // WPCS: XSS OK.

}
endif;

/*ためし*/

if ( ! function_exists( 'bakusui_posted_on_loop' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function bakusui_posted_on_loop() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s更新', 'post date', 'bakusui' ),
		'<span>' . $time_string . '</span>'
	);

	$bylineloop = sprintf(
		esc_html( 'by '.get_the_author() )
	);

	echo '<span class="byline-loop"> ' . $bylineloop . '</span> <span class="posted-on-loop">' . $posted_on . '</span> '; // WPCS: XSS OK.

}
endif;
/*ためし*/

/*タグを記事のトップに表示*/
if ( ! function_exists( 'bakusui_h1_tag' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function bakusui_h1_tag() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( '  ', 'bakusui' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links tags-links-h1">' . esc_html__( '%1$s', 'bakusui' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
}
endif;

if ( ! function_exists( 'bakusui_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function bakusui_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {

		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'bakusui' ) );
		if ( $categories_list && bakusui_categorized_blog() ) {
			printf( '<span class="cat-links wbfont no-decoration">' . esc_html__( '- %1$s', 'bakusui' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( '  ', 'bakusui' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links tags-links-footer">' . esc_html__( '%1$s', 'bakusui' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'bakusui' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'bakusui' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function bakusui_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'bakusui_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'bakusui_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so bakusui_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so bakusui_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in bakusui_categorized_blog.
 */
function bakusui_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'bakusui_categories' );
}
add_action( 'edit_category', 'bakusui_category_transient_flusher' );
add_action( 'save_post',     'bakusui_category_transient_flusher' );
