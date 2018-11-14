<?php
/**
 * cleanhands functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cleanhands
 */

if ( ! function_exists( 'cleanhands_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cleanhands_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cleanhands, use a find and replace
		 * to change 'cleanhands' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cleanhands', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'cleanhands' ),
			'menu-2' => esc_html__( 'Top Nav', 'cleanhands' ),
			'menu-3' => esc_html__( 'Social Menu', 'cleanhands' ),
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
		add_theme_support( 'custom-background', apply_filters( 'cleanhands_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add theme support for Gutenberg wide
		add_theme_support( 'align-wide' );

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
add_action( 'after_setup_theme', 'cleanhands_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cleanhands_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'cleanhands_content_width', 640 );
}
add_action( 'after_setup_theme', 'cleanhands_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cleanhands_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cleanhands' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cleanhands' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'cleanhands' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'cleanhands' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'cleanhands' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'cleanhands' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'cleanhands' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'cleanhands' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'cleanhands' ),
		'id'            => 'Footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'cleanhands' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 5', 'cleanhands' ),
		'id'            => 'footer-5',
		'description'   => esc_html__( 'Add widgets here.', 'cleanhands' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'cleanhands_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cleanhands_scripts() {
	wp_enqueue_style( 'cleanhands-style', get_stylesheet_uri() );

	wp_enqueue_script( 'cleanhands-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'cleanhands-scripts', get_template_directory_uri() . '/js/custom-scripts.js', array(), '20151215', true );

	wp_enqueue_script( 'cleanhands-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cleanhands_scripts' );

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


/**
 * CUSTOM FUNCTIONS
 */

// Add Google Fonts
function add_google_fonts() {
	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Khula:300,400,600,700,800', false );
	}

add_action( 'wp_enqueue_scripts', 'add_google_fonts' );

// Add Font Awesome
function add_font_awesome() {
	wp_enqueue_style( 'add-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
}

add_action( 'wp_enqueue_scripts', 'add_font_awesome' );


// Adding custom classes to pages
function default_body_class( $classes ) {
    if( is_page() && !is_page_template() && !is_front_page() )
      $classes[] = 'default';
    	return $classes;
}
add_filter( 'body_class', 'default_body_class' );

function landing_body_class( $classes ) {
    if( is_page_template('page-landing.php') )
      $classes[] = 'landing';
    	return $classes;
}
add_filter( 'body_class', 'landing_body_class' );


// Custom post type for trips
function our_trips() {
	$labels = array(
		'name' => _x("Our Trips", "post type general name"),
		'singular_name' => _x("Trip", "post type singular name"),
		'menu_name' => 'Our Trips',
		'add_new' => _x("Add New", "item"),
		'add_new_item' => __("Add New Trip"),
		'edit_item' => __("Edit Trip"),
		'new_item' => __("New Trip"),
		'view_item' => __("View Trip"),
		'parent_item_colon' => ''
	);

	register_post_type('our_trips' , array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-welcome-write-blog',
		'rewrite' => array('slug' => 'our-trips'),
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
	) );
}

add_action( 'init', __NAMESPACE__.'\\our_trips' );

//Add color presets for Beaver Builder
function bb_color_presets($colors) {
    $colors = array();
      $colors[] = 'FFC601';
      $colors[] = '1851C1';
      $colors[] = '0B2964';
      $colors[] = '05CEAA';
      $colors[] = 'A2DBE3';
      $colors[] = 'FF3B3F';
			$colors[] = '4CCB14';
			$colors[] = 'C6ED17';
			$colors[] = 'FEFCFC';
			$colors[] = 'A9A9A9';
			$colors[] = '242323';
    return $colors;
}
add_filter( 'fl_builder_color_presets', 'bb_color_presets' );
