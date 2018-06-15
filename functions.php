<?php
/**
 * Dutchtown functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dutchtown
 */

function dutchtown_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	require get_template_directory() . '/inc/woocommerce.php';
}
add_action( 'after_setup_theme', 'dutchtown_add_woocommerce_support' );

if ( ! function_exists( 'dutchtown_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dutchtown_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Dutchtown, use a find and replace
		 * to change 'dutchtown' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dutchtown', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'dutchtown' ),
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
		add_theme_support( 'custom-background', apply_filters( 'dutchtown_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'dutchtown_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
// function dutchtown_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'dutchtown_content_width', 640 );
// }
// add_action( 'after_setup_theme', 'dutchtown_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if ( ! function_exists( dutchtown_widgets_init ) ) :
	function dutchtown_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'dutchtown' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dutchtown' ),
			'before_widget' => '<section>',
			'after_widget'  => '</section>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Shop', 'dutchtown' ),
			'id'            => 'woo-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'dutchtown' ),
			'before_widget' => '<section>',
			'after_widget'  => '</section>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer One', 'dutchtown' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'dutchtown' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Two', 'dutchtown' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'dutchtown' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Three', 'dutchtown' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'dutchtown' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Four', 'dutchtown' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'dutchtown' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );
	}
endif;
add_action( 'widgets_init', 'dutchtown_widgets_init' );

//	Enqueue scripts and styles.
if ( ! function_exists( dutchtown_scripts ) ) :
	function dutchtown_enqueue() {
		wp_enqueue_style( 'dutchtown-style', get_stylesheet_uri() );

		wp_enqueue_script( 'dutchtown-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

		wp_enqueue_script( 'dutchtown-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'dutchtown_enqueue' );

if ( ! function_exists( dutchtown_read_more ) ) :
	function dutchtown_read_more( $more ) {
		return sprintf( '&hellip;&ensp;<a href="%1$s">%2$s&nbsp;<i class="fas fa-arrow-alt-circle-right"></i></a>', get_permalink( get_the_ID() ), __( 'Read&nbsp;more', 'dutchtown' ) );
	}
endif;
add_filter( 'excerpt_more', 'dutchtown_read_more' );

//	Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

//	Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

//	Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

//	Customizer additions.
require get_template_directory() . '/inc/customizer.php';

//	Custom comment walker to ouput comments in <dl> tags.
require get_template_directory() . '/inc/comment-walker.php';

//	Adjustments to Events Calendar functions.
require get_template_directory() . '/inc/tribe-events.php';

//	Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//	Soil features
//	https://github.com/roots/soil
//	Cleaner WordPress markup
add_theme_support('soil-clean-up');
//	Disable asset versioning
add_theme_support('soil-disable-asset-versioning');
//	Disable trackbacks
add_theme_support('soil-disable-trackbacks');
//	Google Analytics (more info)
//	add_theme_support('soil-google-analytics', 'UA-XXXXX-Y');
//	Load jQuery from the jQuery CDN
//	add_theme_support('soil-jquery-cdn');
//	Move all JS to the footer
add_theme_support('soil-js-to-footer');
//	Cleaner walker for navigation menus
add_theme_support('soil-nav-walker');
//	Convert search results from /?s=query to /search/query/
add_theme_support('soil-nice-search');
//	Root relative URLs
add_theme_support('soil-relative-urls');

//	Return an alternate title, without prefix, for every type used in the get_the_archive_title().
//	https://wordpress.stackexchange.com/questions/175884/how-to-customize-the-archive-title
add_filter('get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_year() ) {
        $title = get_the_date( _x( 'Y', 'yearly archives date format' ) );
    } elseif ( is_month() ) {
        $title = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
    } elseif ( is_day() ) {
        $title = get_the_date( _x( 'F j, Y', 'daily archives date format' ) );
    } elseif ( is_tax( 'post_format' ) ) {
        if ( is_tax( 'post_format', 'post-format-aside' ) ) {
            $title = _x( 'Asides', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
            $title = _x( 'Galleries', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
            $title = _x( 'Images', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
            $title = _x( 'Videos', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
            $title = _x( 'Quotes', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
            $title = _x( 'Links', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
            $title = _x( 'Statuses', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
            $title = _x( 'Audio', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
            $title = _x( 'Chats', 'post format archive title' );
        }
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } else {
        $title = __( 'Archives' );
    }
    return $title;
});

//Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
	$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
	}
	add_filter( 'body_class', 'add_slug_body_class' );
?>