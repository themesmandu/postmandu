<?php
/**
 * Postmandu functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Postmandu
 */

if ( ! function_exists( 'postmandu_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function postmandu_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Postmandu, use a find and replace
		 * to change 'postmandu' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'postmandu', get_template_directory() . '/languages' );

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

		// Custom Image Sizes.
		add_image_size( 'postmandu-thumb-750-300', 750, 300, true ); // crop.
		add_image_size( 'postmandu-featured-900-600', 900, 600, true ); // crop.
		add_image_size( 'postmandu-cover-image', 1200, 9999 );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'postmandu' ),
				'social'  => esc_html__( 'Social Menu', 'postmandu' ),
				'footer'  => esc_html__( 'Footer Menu', 'postmandu' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Add support for core custom background feature.
		 *
		 * @link https://codex.wordpress.org/Custom_Backgrounds
		 */
		$defaults = array(
			'default-color' => 'ffffff',
			'default-image' => '',
		);
		add_theme_support( 'custom-background', $defaults );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 55,
				'width'       => 200,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'postmandu_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function postmandu_content_width() {
	// This variable is intended to be overruled from themes.
	$GLOBALS['content_width'] = apply_filters( 'postmandu_content_width', 640 );
}
add_action( 'after_setup_theme', 'postmandu_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function postmandu_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'postmandu' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'postmandu' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Newsletter-widget', 'postmandu' ),
				'id'            => 'postmandu_newsletter',
				'description'   => esc_html__( 'Add widgets here.', 'postmandu' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			)
		);

	for ( $i = 1; $i <= 4; $i++ ) {
		register_sidebar(
			array(
				/* translators: %d: footer widget number. */
				'name'          => sprintf( esc_html__( 'Footer Widgets %d', 'postmandu' ), $i ),
				'id'            => 'footer-' . $i,
				'description'   => esc_html__( 'Add widgets here.', 'postmandu' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
}
add_action( 'widgets_init', 'postmandu_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function postmandu_scripts() {

	// Bootstrap reboot styles.
	wp_enqueue_style( 'bootstrap-reboot', get_template_directory_uri() . '/vendor/bootstrap-src/css/bootstrap-reboot.min.css', array( 'postmandu-style' ), '4.1.2' );

	// Bootstrap styles.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap-src/css/bootstrap.min.css', array( 'postmandu-style' ), '4.1.2' );

	// Theme styles.
	wp_enqueue_style( 'postmandu-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	// Loading menu dropdown stylesheet.
	wp_enqueue_style( 'menu-dropdown', get_theme_file_uri( '/assets/css/dropdown.min.css' ), array( 'postmandu-style' ), wp_get_theme()->get( 'Version' ) );

	// Loading main stylesheet.
	wp_enqueue_style( 'main', get_theme_file_uri( '/assets/css/main.min.css' ), array( 'postmandu-style' ), wp_get_theme()->get( 'Version' ) );

	// Loading mediascreen stylesheet.
	wp_enqueue_style( 'mediascreen', get_theme_file_uri( '/assets/css/mediascreen.min.css' ), array( 'postmandu-style' ), wp_get_theme()->get( 'Version' ) );

	// Add font-awesome fonts, used in the main stylesheet.
	wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/assets/font-awesome-5.7.2/css/all.css' ), array( 'postmandu-style' ), '5.7.2' );

	// Dashicons Support
	wp_enqueue_style( 'dashicons' );

	// Bootstrap core JavaScript: jQuery first, then Popper.js, then Bootstrap JS.
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/vendor/bootstrap-src/js/popper.min.js', array(), '1.14.3', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap-src/js/bootstrap.min.js', array(), '4.1.2', true );

	// Theme added JavaScript: Added by Developers.
	wp_enqueue_script( 'postmandu-global', get_template_directory_uri() . '/assets/js/global.min.js', array(), wp_get_theme()->get( 'Version' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'postmandu_scripts' );



/**
 * Load theme required files.
 */
require get_template_directory() . '/inc/init.php';


