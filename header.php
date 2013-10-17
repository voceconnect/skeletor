<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"  <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8"  <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9"  <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"  <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?php wp_title( '&laquo;', true, 'right' ); ?> <?php bloginfo( 'name' ); ?></title>
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/theme.css">
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/libs/modernizr-2.6.2-min.js"></script>
        <!--[if (gte IE 6)&(lte IE 8)]>
            <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/libs/selectivizr-min.js"></script>
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/libs/rem.min.js"></script>
        <![endif]-->			
		<?php wp_head(); ?>
    </head>

    <body <?php body_class('bs-docs-home'); ?>>
		<header class="navbar navbar-inverse" role="banner">
			<div class="container">
				<div class="navbar-header">
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="/" class="navbar-brand">Project Name</a>
				</div>
				<?php wp_nav_menu( array(
					'theme_location' => 'primary',
					'container' 		=> 'nav',
					'container_class' 	=> 'navbar-collapse bs-navbar-collapse collapse',
					'menu_class' 		=> '',
					'items_wrap'      	=> '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>'
				) ); ?>
			</div>
		</header>