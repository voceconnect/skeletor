<?php
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
add_filter( 'show_admin_bar', '__return_false' );
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'wp_generator');
add_filter('show_admin_bar', '__return_false');
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
add_editor_style('css/editor-style.css');

/**
 * cache busts the passed in asset when it has been modified by appending a
 * date/time stamp as a querystring parameter
 *
 * @return (string) the asset to be cache busted with query string param
 * */
function voce_cache_buster($url, $mtime = null) {
    if (strpos($url, '?m='))
        return $url;

    if (is_null($mtime)) {
        $parts = parse_url($url);

        if (!isset($parts['path']) || empty($parts['path'])) {
            $mtime = false;
        } else {
            $file = ABSPATH . ltrim($parts['path'], '/');

            // comment out next two lines for standard wp install
            global $current_blog;
            $file = str_ireplace($current_blog->path . "wp-content", "/wp-content", $file);

            if (!$mtime = @filemtime($file))
                $mtime = false;
        }
    }

    if (!$mtime)
        return $url;

    list($url, $q) = explode('?', $url, 2); //Get rid of any query string
    return "$url?m=$mtime";
}

//theme settings & image sizes
if (!isset($content_width))
    $content_width = 640;

//add_theme_support('automatic-feed-links');
//add_theme_support('post-thumbnails');
//add_image_size('thumb-60x60', 60, 60, true);

/**
 * Global theme script enqueing
 *
 */
function voce_theme_enqueue_scripts() {
<<<<<<< HEAD
	$template_dir = get_template_directory_uri();
	if ( !is_admin() ) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('main', $template_dir . '/js/script.js', 'jquery', false, true);
		wp_enqueue_script('plugins', $template_dir . '/js/plugins.js', 'jquery', false, true);
	}
=======
    $template_dir = get_template_directory_uri();
    if (!is_admin()) {
        wp_enqueue_script('jquery');
        wp_enqueue_script('main', $template_dir . '/js/script.js', 'jquery', false, true);
    }
>>>>>>> validate_theme
}

add_action('wp_enqueue_scripts', 'voce_theme_enqueue_scripts', null, null, true);


//plugin includes
//require_once(dirname(__FILE__).'/plugins/.php');
//widgets includes
//require_once(dirname(__FILE__) . '/widgets.php');
//sidebars
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Main Sidebar',
        'id' => 'sidebar-main',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));


    // secondary sidebar that shows up everywhere but the home page if it has
    // widgets, otherwise the sidebar above is used
    register_sidebar(array(
        'name' => 'Secondary Sidebar',
        'id' => 'sidebar-secondary',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}

//comment function
function mytheme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <div <?php comment_class(); ?> id="div-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment-id">
            <div class="author-info">
                <?php comment_author_link() ?> <span><?php
            if ($comment->comment_author_email == get_the_author_meta('email'))
                _e('responded', 'skeletor'); else
                _e('said', 'skeletor');
                ?>:</span><br/>
                <small><?php printf(__('%1$s at %2$s', 'skeletor'), get_comment_date(), get_comment_time()) ?></small>
            </div>
            <div class="comment-text">
                <?php comment_text() ?>
                <?php if ($comment->comment_approved == '0') : ?>
                    <br />
                    <em><?php _e('Your comment is awaiting moderation.', 'skeletor') ?></em>
                <?php endif; ?>
                <div class="reply">
                    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <?php
}

//body class manipulation
function filter_body_class($classes) {
    $post_id = get_the_ID();
    $post = get_post($post_id);

    // add page-PAGENAME to body class
    if (is_page()) {
        // add page slug
        $classes[] = 'page-' . $post->post_name;
    }

    return $classes;
}

add_filter('body_class', 'filter_body_class');
