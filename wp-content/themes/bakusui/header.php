<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bakusui
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Nunito:800" rel="stylesheet">
<link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/notosansjp.css">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemschope="itemscope" itemtype="http://schema.org/WebPage">
	<!-- チェックボックス -->
	<input type="checkbox" class="check" id="checked">
	<div class="menu-btn-bg"></div>
	<label class="menu-btn"  for="checked">
			<!-- MENUボタン -->
			<div class="menu-btn-inner">
					<span></span>
					<span></span>
					<span></span>
			</div>
	</label>
	<label class="close-menu" for="checked"></label>
	<!-- ドロワー -->
	<nav id="drawer-navigation" class="drawer-menu" role="navigation"  itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
		<?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'secondary-menu','menu_class' =>'wbfont' ) ); ?>
	</nav>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bakusui' ); ?></a>
			<header id="masthead" class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
					<div class="copy-vertical">
						<p class="copy-svg"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/img_baku_tate.svg" alt="獏睡"></p>
						<p class="copy-vertical-inner">© Copyright Luci Co., Ltd. All rights reserved.</p>
					</div><!-- #copy-vertical-->

					<nav id="sns-navigation" class="sns-navigation" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
						<ul class="menu-sns">
							<li class="menu-sns-item"><a href="###" target="_blank"><i class="fa fa-rss fa-lg" aria-hidden="true"></i></a></li>
							<li class="menu-sns-item"><a href="###" target="_blank"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a></li>
							<li class="menu-sns-item"><a href="###" target="_blank"><i class="fa fa-facebook-official fa-lg" aria-hidden="true"></i></a></li>
						</ul>
					</nav><!-- #sns-navigation -->

				<div class="site-branding">
					<?php
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<p class="logo"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/img_logo.svg" alt="<?php bloginfo( 'name' ); ?>"></p>
							<p class="site-charactor"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/img_charactor.svg"></a></p>
					</a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<span class="logo"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/img_logo_2nd.svg" alt="<?php bloginfo( 'name' ); ?>"></span>
						</a></p>
					<?php
					endif; ?>
				</div><!--/site-branding-->

				<nav id="site-navigation" class="main-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu','menu_class' =>'wbfont' ) ); ?>
				</nav><!-- #site-navigation -->

			</header><!-- #masthead -->

			<div id="content" class="site-content">
