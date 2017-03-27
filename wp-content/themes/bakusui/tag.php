<?php
/**
 * The template for displaying tag pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bakusui
 */

get_header(); ?>
	<header class="page-header">

		<?php
			the_archive_title( '<h1 class="page-title icon-tag">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
		?>
	</header>

	<div id="primary" class="content-area-1col">
		<main id="main" class="site-main" role="main">
  		<div id="cate_post_content" class="front-loop">
				<div class="front-loop-cont">
							<?php
							$i = 1;
							if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) : the_post();

								$cf = get_post_meta($post->ID);
								$cate_class = 'cate_post_box cate-'.$i;
						?>

							<article id="post-<?php echo the_ID(); ?>" <?php post_class($cate_class); ?>>
									<a href="<?php the_permalink(); ?>" class="wrap-a"><?php if( get_the_post_thumbnail() ) { ?>
										<div class="post-thumbnail">
										<?php the_post_thumbnail('bakusui_single_size'); ?>
										</div>
										<?php } else{ ?>
											<img src="<?php echo get_template_directory_uri(); ?>/img/noimage.png" alt="noimage" width="800" height="533" />
										<?php } // get_the_post_thumbnail ?>
												<h3 class="title"><?php the_title(); ?></h3>
												<?php bakusui_posted_on_loop(); ?>
												<p class="p_category wbfont">- <?php $cat = get_the_category(); $cat = $cat[0]; {
											echo $cat->cat_name;
										} ?>
											</p>
									</a>
							</article>

							<?php
											$i++;
											endwhile;
										endif;
							?>
				</div><!--#front-loop-cont-->
			</div><!--#cate_post_content-->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
/*get_sidebar();*/
get_footer();
