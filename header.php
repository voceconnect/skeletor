<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/img/favicon.ico"/>
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory');?>/img/voce_appletouch.png"/>

	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/style.css">
	<script src="<?php bloginfo('template_directory');?>/js/libs/modernizr-2.0.6.min.js"></script>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="container">
	<header>

	</header>
	<div id="main">