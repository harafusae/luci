<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bakusui
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
    <!--新着記事エリア-->
    <div id="recent_post_content" class="front-loop">

    <h2 class="front-loop-header screen-reader-text">新着記事</h2>
      <div class="front-loop-cont">
        <?php
        $i = 1;

        if ( have_posts() ) :
          while ( have_posts() ) : the_post();

          $cf = get_post_meta($post->ID);
          $recent_class = 'recent_post_box recent-'.$i;
  ?>

    <article id="post-<?php echo the_ID(); ?>" <?php post_class($recent_class); ?>>
        <a href="<?php the_permalink(); ?>" class="wrap-a"><?php if( get_the_post_thumbnail() ) { ?>
          <div class="post-thumbnail">
          <?php the_post_thumbnail('bakusui_single_size'); ?>
          </div>
          <?php } else{ ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/noimage.png" alt="noimage" width="800" height="533" />
          <?php } // get_the_post_thumbnail ?>
					<div class="icon-new"><img src="<?php echo get_template_directory_uri(); ?>/img/img_new.svg" alt="new" width="100%" height="100%"/></div>
							<h3 class="title"><?php the_title(); ?></h3>
							<?php bakusui_posted_on_loop(); ?>
              <p class="p_category wbfont">- <?php $cat = get_the_category(); $cat = $cat[0]; {
            echo $cat->cat_name;
          } ?>
						</p>
					<!--<div class="article-arrow"><img src="<?php echo get_template_directory_uri();?>/img/bakusui_arrow.svg"></div>-->
				</a>
    </article>

  <?php
          $i++;
          endwhile;
        endif;
  ?>

      </div><!-- /front-root-cont -->
    </div><!--recent_post_content-->
    <!--/新着記事エリア end-->
		<hr>
    <!--人気記事エリア-->
    <div id="popular_post_content" class="front-loop">
        <h2 class="front-loop-header wbfont">HOT TOPICS</h2>
        <div class="wrap">
        <!--<div class="front-loop-cont">-->
				<!-- WordPress popular posts custumize-->
				<?php	get_my_popular_posts(8, 'day');?>
				<!-- #popular posts custumize-->
      <!--</div>--><!--#populat_post_content-->
      <!--/人気記事エリアend-->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
/*get_sidebar();*/
get_footer();
