<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">

		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		<meta name="description" content="<?php bloginfo('description');?>">
		<meta name="author" content="">

		<!-- Mobile viewport optimized: j.mp/bplateviewport -->
		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico"/>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() ?>/img/voce_appletouch.png"/>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
        <!--[if (gte IE 6)&(lte IE 8)]>
			<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/libs/selectivizr-min.js"></script>
			<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/libs/modernizr-2.5.1-min.js"></script>
        <![endif]-->			

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <?php if (is_singular())
            wp_enqueue_script('comment-reply'); ?>

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="container">
            <header>

            </header>
            <div id="main">