<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bakusui
 */

?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="pagetop wbfont"><a href="#top">PAGETOP^</a></div>
				<div class="site-info">
					<nav class="link-footer">
						<ul class="link-footer-list" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
							<li><a href="<?php bloginfo('url'); ?>/about/
">このサイトについて</a></li>
							<li><a href="https://www.luci.co.jp/jp/zero_to_one/inquiry/">お問い合わせ</a></li>
							<li><a href="<?php bloginfo('url'); ?>/company/">運営会社</a></li>
						</ul>
					</nav><!-- #link-footer -->
					<nav id="sns-navigation" class="sns-navigation-f" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
						<ul class="menu-sns">
							<li class="menu-sns-item"><a href="###" target="_blank"><i class="fa fa-rss fa-lg" aria-hidden="true"></i></a></li>
							<li class="menu-sns-item"><a href="###" target="_blank"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a></li>
							<li class="menu-sns-item"><a href="###" target="_blank"><i class="fa fa-facebook-official fa-lg" aria-hidden="true"></i></a></li>
						</ul>
					</nav><!-- #sns-navigation -->
					<div class="copyright">バクスイ © Copyright Luci Co., Ltd. All rights reserved.</div>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->

		</div><!-- #page -->

		<?php wp_footer(); ?>
</body>
</html>
