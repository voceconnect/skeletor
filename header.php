<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/img/favicon.ico"/>
  <link rel="apple-touch-icon" href="<?php bloginfo('template_directory');?>/img/voce_appletouch.png"/>

  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/style.css">
  <script src="<?php bloginfo('template_directory');?>/js/libs/modernizr-1.7.min.js"></script>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<!-- Typekit JS Files, don't forget to change the account number in the first line
	<script type="text/javascript" src="http://use.typekit.com/beo8usd.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	-->

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="container">
	<header>

	</header>
	<div id="main">