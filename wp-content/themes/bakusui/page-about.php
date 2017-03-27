<?php
/**
 * The template for displaying /about/ page.
 * @package bakusui
 */

get_header(); ?>

	<div class="about-header">
		<span><img src="<?php echo get_template_directory_uri(); ?>/img/img_light.svg"></span>
		<div class="m-block">
		<h1>めちゃくちゃ寝よう。<br />強くなろう。</h1>
		</div>
	</div>

	<div class="content-wrapper no-h1">
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
