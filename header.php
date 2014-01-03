<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<!--[if (gte IE 6)&(lte IE 8)]>
				<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/libs/selectivizr-min.js"></script>
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/libs/rem.min.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<?php do_action( 'before' ); ?>
		<header class="navbar navbar-inverse" role="banner" id="masthead">
			<div class="container">
				<div class="navbar-header">
					<form role="search" method="get" class="search-form" action="/">
						<label>
							<span class="screen-reader-text">Search for:</span>
							<input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Search for:">
						</label>
						<input type="submit" class="search-submit" value="Search">
					</form>
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="/" class="navbar-brand">Project Name</a>
				</div>
				<?php
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container' => 'nav',
						'container_class' => 'navbar-collapse bs-navbar-collapse collapse',
						'menu_class' => '',
						'depth' => '1',
						'items_wrap' => '<ul id="%1$s" class="%2$s nav navbar-nav" role="navigation">%3$s</ul>'
					) );
				}
				?>
			</div>
		</header>
