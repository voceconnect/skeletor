<?php

/**
 * skeletor functions and definitions
 *
 * @package skeletor
 */
add_editor_style( 'editor-style.css' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( !isset( $content_width ) )
	$content_width = 780; /* pixels */

if ( !function_exists( 'skeletor_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function skeletor_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on skeletor, use a find and replace
		 * to change 'skeletor' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'skeletor', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'skeletor' ),
		) );

		// Enable support for Post Formats.
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

		// Setup the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'skeletor_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// setup base actions
		add_action( 'widgets_init', 'skeletor_widgets_init' );
		add_action( 'wp_enqueue_scripts', 'skeletor_scripts' );
	}

endif; // skeletor_setup
add_action( 'after_setup_theme', 'skeletor_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function skeletor_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'skeletor' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}

/**
 * Enqueue scripts and styles.
 */
function skeletor_scripts() {
	$template_dir = get_template_directory_uri();

	wp_enqueue_style( 'skeletor-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'modernizr', $template_dir . '/js/libs/modernizr.min.js', false, '2.7.1', false );

	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		wp_enqueue_script( 'bootstrap', $template_dir . '/js/libs/bootstrap.min.js', array( 'jquery' ), '3.0.0', true );
		wp_enqueue_script( 'skeletor', $template_dir . '/js/main.js', array( 'jquery', 'bootstrap', 'modernizr' ), '0.1.0', true );
	} else {
		wp_enqueue_script( 'bootstrap', $template_dir . '/js/libs/bootstrap.min.js', array( 'jquery' ), '3.0.0', true );
		wp_enqueue_script( 'skeletor', $template_dir . '/js/main.min.js', array( 'jquery', 'bootstrap', 'modernizr' ), '0.1.0', true );
	}
}

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
