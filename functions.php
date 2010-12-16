<?php
//theme settings & image sizes
if ( ! isset( $content_width ) )
	$content_width = 640;

//add_theme_support('automatic-feed-links');
//add_theme_support('post-thumbnails');
//add_image_size('thumb-60x60', 60, 60, true);

/**
 * Global theme script enqueing
 *
 */
function voce_theme_enqueue_scripts() {
	$template_dir = get_template_directory_uri();
	if ( !is_admin() ) {
		wp_enqueue_script('main', $template_dir . '/js/main.js', 'jquery', false, true);
	}
}
add_action('wp_enqueue_scripts', 'voce_theme_enqueue_scripts',null,null,true);


//plugin includes
//require_once(dirname(__FILE__).'/plugins/.php');

//widgets includes
//require_once(dirname(__FILE__) . '/widgets.php');

//sidebars
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Main Sidebar',
		'id' => 'sidebar-main',
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
			<?php comment_author_link() ?> <span><?php if ($comment->comment_author_email == get_the_author_email()) echo 'responded'; else echo 'said'; ?>:</span><br/>
			<small><?php printf(__('%1$s at %2$s'), get_comment_date(),	get_comment_time()) ?></small>
		</div>
		<div class="comment-text">
			<?php comment_text() ?>
			<?php if ($comment->comment_approved == '0') : ?>
				<br />
				<em><?php _e('Your comment is awaiting moderation.') ?></em>
			<?php endif; ?>
			<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
		</div>
		<div class="clr"></div>
		</div>
	</div>
<?php
}

//body class manipulation
function filter_body_class($classes){
	$post_id = get_the_ID();
	$post = get_post($post_id);

	// add page-PAGENAME to body class
	if (is_page())
	{
		// add page slug
		$classes[] = 'page-' . $post->post_name;
	}

	return $classes;
}
add_filter('body_class','filter_body_class');
