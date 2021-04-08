<?php
/**
 * weareedit functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package weareedit
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'weareedit_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function weareedit_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on weareedit, use a find and replace
		 * to change 'weareedit' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'weareedit', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'weareedit' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		
	}
endif;
add_action( 'after_setup_theme', 'weareedit_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function weareedit_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'weareedit' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'weareedit' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'weareedit_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function weareedit_scripts() {

    // wp_enqueue_style( 'weareedit-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css', _S_VERSION );
	wp_enqueue_style( 'weareedit-bootstrap', get_template_directory_uri() . '/css/grid/bootstrap.css', _S_VERSION );
	wp_enqueue_style( 'weareedit-fonts', get_template_directory_uri() . '/css/fonts/fonts.css?ver=5.3.6' , _S_VERSION );
    wp_enqueue_style( 'weareedit-social-icons', get_template_directory_uri() . '/css/fonts/social-icons.css' , _S_VERSION );
    wp_enqueue_style( 'weareedit-swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css' , _S_VERSION );
    wp_enqueue_style( 'weareedit-icons-edit', get_template_directory_uri() . '/css/icons-edit.css' , _S_VERSION );
    wp_enqueue_style( 'weareedit-menu-styles', get_template_directory_uri() . '/css/menu.css' , _S_VERSION );
	wp_enqueue_style( 'weareedit-mobile-styles', get_template_directory_uri() . '/css/mobile.css' , _S_VERSION );
    wp_enqueue_style( 'weareedit-style', get_stylesheet_uri(), array(), _S_VERSION );

    wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-1.11.0.min.js', _S_VERSION, true );
    wp_enqueue_script( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', _S_VERSION, true );
    wp_enqueue_script( 'scrolla', get_template_directory_uri() .'/js/vendor/jquery.scrolla.min.js', _S_VERSION, true );
    wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js', _S_VERSION, true );
    wp_enqueue_script( 'splitting', 'https://unpkg.com/splitting/dist/splitting.min.js', _S_VERSION, true );
    wp_enqueue_script( 'scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.3/ScrollTrigger.min.js', _S_VERSION, true );
    wp_enqueue_script( 'masonry', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', _S_VERSION, true );
    
    wp_enqueue_script( 'weareedit-menu', get_template_directory_uri() . '/js/menu.js', _S_VERSION, true, true );
    wp_enqueue_script( 'weareedit-animations', get_template_directory_uri() . '/js/animations.js', _S_VERSION, true, true );
    wp_enqueue_script( 'weareedit-app', get_template_directory_uri() . '/js/app.js', _S_VERSION, true, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'weareedit_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

include_once dirname(__FILE__) . "/inc/custom-post-types.php";