<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bakusui
 */

get_header(); ?>
	<div class="entry-meta2 wbfont">
		<?php bakusui_posted_on2(); ?>
	</div>

	<!---#アイキャッチ画像big-->
	<div class ="thumbnails-big" style="background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() );?>)">
		<!--<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() );?>"/>-->
		<?php echo bakusui_h1_tag(); ?>
	</div>
	<!---#アイキャッチ画像big-->
	<div class="content-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
