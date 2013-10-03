<footer role="contentinfo">
	<div class="container">
		<?php echo '<p class="pull-left">&copy; ' . date('Y') . '</p>';?>
		<div class="pull-right">
			<?php wp_nav_menu( array(
				'theme_location' => 'primary',
				'container' 		=> 'nav',
				'container_class' 	=> 'nav-collapse bs-navbar-collapse',
				'menu_class' 		=> '',
				'items_wrap'      	=> '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>'
			) ); ?>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>

</body>
</html>
