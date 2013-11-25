<?php
/**
 * _skeletor functions and definitions
 *
 * @package _skeletor
 */

add_editor_style( 'css/editor-style.css' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 780; /* pixels */
	
if ( ! function_exists( '_skeletor_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _skeletor_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _skeletor, use a find and replace
	 * to change '_skeletor' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '_skeletor', get_template_directory() . '/languages' );

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
		'primary' => __( 'Primary Menu', '_skeletor' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( '_skeletor_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // _skeletor_setup
add_action( 'after_setup_theme', '_skeletor_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function _skeletor_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', '_skeletor' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', '_skeletor_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _skeletor_scripts() {
	$template_dir = get_template_directory_uri();
	wp_enqueue_style( '_skeletor-style', get_stylesheet_uri() );

	wp_enqueue_script( '_skeletor-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( '_skeletor-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		
	if( !is_admin() ) :
        wp_enqueue_script( 'main', $template_dir . '/js/script.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'affix', $template_dir . '/js/bootstrap/affix.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'alert', $template_dir . '/js/bootstrap/alert.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'button', $template_dir . '/js/bootstrap/button.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'carousel', $template_dir . '/js/bootstrap/carousel.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'collapse', $template_dir . '/js/bootstrap/collapse.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'dropdown', $template_dir . '/js/bootstrap/dropdown.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'modal', $template_dir . '/js/bootstrap/modal.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'popover', $template_dir . '/js/bootstrap/popover.js', array( 'jquery', 'tooltip' ), false, true );
        wp_enqueue_script( 'scrollspy', $template_dir . '/js/bootstrap/scrollspy.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'tab', $template_dir . '/js/bootstrap/tab.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'tooltip', $template_dir . '/js/bootstrap/tooltip.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'transition', $template_dir . '/js/bootstrap/transition.js', array( 'jquery' ), false, true );

    endif;
    
}
add_action( 'wp_enqueue_scripts', '_skeletor_scripts' );

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
