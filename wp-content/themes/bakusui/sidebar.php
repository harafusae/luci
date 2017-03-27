<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bakusui
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<!--人気記事エリア-->
	<div id="popular_post_content" class="aside-loop">
			<h2 class="aside-loop-header wbfont">
				<span class="aside-loop-header-title">HOT TOPICS</span>
				<span class="aside-loop-header-cap">人気の記事</span>
			</h2>
			<div class="wrap">
			<!-- WordPress popular posts custumize-->
			<?php	get_my_popular_posts(8, 'day');?>
			<!-- #popular posts custumize-->
		<!--/人気記事エリアend-->

	<!--<?php dynamic_sidebar( 'sidebar-1' ); ?>-->
</aside><!-- #secondary -->

</div><!--#content-wrapper-->
