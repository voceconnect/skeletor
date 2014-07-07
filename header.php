<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<?php do_action( 'before' ); ?>
		<header role="banner">
			<div class="container">
				<form role="search" method="get" class="pull-right" action="/">
					<label>
						<span class="screen-reader-text">Search for:</span>
						<input type="search" placeholder="Search …" value="" name="s" title="Search for:">
					</label>
					<input type="submit" value="Search">
				</form>
				<button class="visible-xs pull-right" type="button">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="/" class="logo">Project Name</a>
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
