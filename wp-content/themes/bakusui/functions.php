<?php
/**
 * bakusui functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bakusui
 */

if ( ! function_exists( 'bakusui_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bakusui_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bakusui, use a find and replace
	 * to change 'bakusui' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bakusui', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 640, 420 );

	add_image_size( 'bakusui_single_size', 640, 420, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'bakusui' ),
	) );

	register_nav_menus( array(
		'menu-2' => esc_html__( 'Secondary', 'bakusui' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bakusui_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'bakusui_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bakusui_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bakusui_content_width', 640 );
}
add_action( 'after_setup_theme', 'bakusui_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bakusui_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bakusui' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bakusui' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title wbfont">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bakusui_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bakusui_scripts() {
	wp_enqueue_style( 'bakusui-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bakusui-fontawesome',get_template_directory_uri().'/font-awesome.min.css' );
	if(!is_home()){
			wp_enqueue_style( 'bakusui-sidestyle', get_template_directory_uri().'/layouts/content-sidebar.css' );
	}

	wp_enqueue_script( 'bakusui-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'bakusui-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bakusui_scripts' );

/**
 * 表示件数の制御
 */
function change_posts_per_page($query) {
    if ( is_admin() || ! $query->is_main_query() )
        return;
    /* トップページの時に表示件数を3件にセット */
    if ( $query->is_front_page() ) {
        $query->set( 'posts_per_page', '6' );
    }
		/* アーカイブの時に表示件数を30件にセット */
 		if ( $query->is_archive() ) {
        $query->set( 'posts_per_page', '30' );
    }
    /* ポストアーカイブの時に表示件数を30件にセット */
 		if ( $query->is_post_type_archive() ) {
        $query->set( 'posts_per_page', '30' );
    }
    /* 検索ページの時に表示件数を20件にセット */
    if ( $query->is_search() ) {
        $query->set( 'posts_per_page', '20' );
    }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );


/*
* popular posts customize
*/

add_filter('wpp_post', function($post_html, $p, $instance)
{
    // サムネイルのアタッチメント情報のIDを取得
    $thumb_id   = get_post_thumbnail_id($p->id);

    // サムネイルのHTMLテキストを取得
    // imgタグをカスタマイズしたいときは、wp_get_attachment_image_src($thumb_id, 'thumbnail'); 配列でsrc、sizeなどが返ってくる。
    $thumb_link = wp_get_attachment_image($thumb_id, 'post-thumbnail');

    // パーマリンク取得
    $perma_link = get_the_permalink($p->id);

    // タイトル取得
    $title      = $p->title;

    // 日付取得
    $date       = date(get_option('date_format'), strtotime($p->date));

    // HTML出力
    $format = '<article class="popular_post_box">
                    <a href="%s" title="%s" class="wrap-a">
												<div class="post-thumbnail">%s</div>
												<div class="post-titleblock">
												<h3 class="title">%s</h3>
                        <span class="posted-on-loop">%s</span>
												</div>
                    </a>
                </article>';

		return sprintf($format, $perma_link, esc_attr($title), $thumb_link, $title, $date);
}, 10, 3);

function get_my_popular_posts($limit = 12, $range = 'all')
{
    if (function_exists('wpp_get_mostpopular')) {
        wpp_get_mostpopular([
            'limit' => $limit,
            'range' => $range,
            'order_by' => 'views',
            'post_type' => 'post',
            'wpp_start' => '<div class="front-loop-cont"><div class="popular-posts-list">',
            'wpp_end' => '</div></div>'
        ]);
    }
}

/**
 * ArchiveTitle 「カテゴリー：」を非表示にする
 */
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        }

    return $title;

});

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
