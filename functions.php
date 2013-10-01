<?php
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnails' );
add_editor_style( 'css/editor-style.css' );

if ( ! isset( $content_width ) )
	$content_width = 780;


// require all files in the plugins directory
$plugin_abs_path = dirname( __FILE__ ) . "/plugins/";
$req_dirs = array( $plugin_abs_path,
    $plugin_abs_path . 'custom-post-types',
    $plugin_abs_path . 'menu-collapse',
    $plugin_abs_path . 'taxonomies',
);
foreach( $req_dirs as $dir ) {
    $files = glob( $dir . '/*.php' );
    foreach( $files as $file )
        require_once($file);
}

/**
 * cache busts the passed in asset when it has been modified by appending a
 * date/time stamp as a querystring parameter
 *
 * @return (string) the asset to be cache busted with query string param
 * */
if( !function_exists( 'voce_cache_buster' ) ) {

    function voce_cache_buster( $url, $mtime = null ) {
        if( strpos( $url, '?m=' ) )
            return $url;

        if( is_null( $mtime ) ) {
            $parts = parse_url( $url );

            if( !isset( $parts['path'] ) || empty( $parts['path'] ) ) {
                $mtime = false;
            } else {
                $file = ABSPATH . ltrim( $parts['path'], '/' );

                // comment out next two lines for standard wp install
                global $current_blog;
                $file = str_ireplace( $current_blog->path . "wp-content", "/wp-content", $file );

                if( !$mtime = @filemtime( $file ) )
                    $mtime = false;
            }
        }

        if( !$mtime )
            return $url;

        list($url, $q) = explode( '?', $url, 2 ); //Get rid of any query string
        return "$url?m=$mtime";
    }

}

//theme settings & image sizes
if( !isset( $content_width ) )
    $content_width = 640;

/**
 * Global theme script enqueing
 *
 */
if( !function_exists( 'voce_theme_enqueue_scripts' ) ) {

    function voce_theme_enqueue_scripts() {
        $template_dir = get_template_directory_uri();
        if( !is_admin() ) {
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'main', $template_dir . '/js/script.js', array( 'jquery' ), false, true );
            wp_enqueue_script( 'affix', $template_dir . '/js/bootstrap/affix.js', array( 'jquery' ), false, true );
            wp_enqueue_script( 'alert', $template_dir . '/js/bootstrap/alert.js', array( 'jquery' ), false, true );
            wp_enqueue_script( 'button', $template_dir . '/js/bootstrap/button.js', array( 'jquery' ), false, true );
            wp_enqueue_script( 'carousel', $template_dir . '/js/bootstrap/carousel.js', array( 'jquery' ), false, true );
            wp_enqueue_script( 'collapse', $template_dir . '/js/bootstrap/collapse.js', array( 'jquery' ), false, true );
            wp_enqueue_script( 'dropdown', $template_dir . '/js/bootstrap/dropdown.js', array( 'jquery' ), false, true );
            wp_enqueue_script( 'modal', $template_dir . '/js/bootstrap/modal.js', array( 'jquery' ), false, true );
            wp_enqueue_script( 'popover', $template_dir . '/js/bootstrap/popover.js', array( 'jquery' ), false, true );
            wp_enqueue_script( 'scrollspy', $template_dir . '/js/bootstrap/scrollspy.js', array( 'jquery' ), false, true );
            wp_enqueue_script( 'tab', $template_dir . '/js/bootstrap/tab.js', array( 'jquery' ), false, true );
            wp_enqueue_script( 'tooltip', $template_dir . '/js/bootstrap/tooltip.js', array( 'jquery' ), false, true );
            wp_enqueue_script( 'transition', $template_dir . '/js/bootstrap/transition.js', array( 'jquery' ), false, true );

			// This script is only for cutup and dev phase. COMMENT OUT WHEN SETTING SITE LIVE
			wp_enqueue_script( 'holder', $template_dir . '/js/libs/holder.js', array( 'jquery' ), false, true );
        }
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

    }

    add_action( 'wp_enqueue_scripts', 'voce_theme_enqueue_scripts' );
}


//sidebars
if( function_exists( 'register_sidebar' ) ) {
    register_sidebar( array(
        'name' => 'Main Sidebar',
        'id' => 'sidebar-main',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );


    // secondary sidebar that shows up everywhere but the home page if it has
    // widgets, otherwise the sidebar above is used
    register_sidebar( array(
        'name' => 'Secondary Sidebar',
        'id' => 'sidebar-secondary',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
}

/**
 * Custom comment callback template
 * 
 * @param type $comment
 * @param type $args
 * @param type $depth 
 */
function mytheme_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?>
    <div <?php comment_class(); ?> id="div-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment-id">
            <div class="author-info">
                <?php comment_author_link() ?> <span><?php
                if( $comment->comment_author_email == get_the_author_meta( 'email' ) )
                    _e( 'responded', 'skeletor' ); else
                    _e( 'said', 'skeletor' );
                ?>:</span><br/>
                <small><?php printf( __( '%1$s at %2$s', 'skeletor' ), get_comment_date(), get_comment_time() ) ?></small>
            </div>
            <div class="comment-text">
                <?php comment_text() ?>
                <?php if( $comment->comment_approved == '0' ) : ?>
                    <br />
                    <em><?php _e( 'Your comment is awaiting moderation.', 'skeletor' ) ?></em>
                <?php endif; ?>
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <?php
}

/**
 * Add the page title to the body class
 * @param array $classes
 * @return array 
 */
if( !function_exists( 'filter_body_class_with_pagename' ) ) {

    function filter_body_class_with_pagename( $classes ) {
        $post_id = get_the_ID();
        $post = get_post( $post_id );

        // add page-PAGENAME to body class
        if( is_page() ) {
            // add page slug
            $classes[] = 'page-' . $post->post_name;
        }

        return $classes;
    }

    add_filter( 'body_class', 'filter_body_class_with_pagename' );
}