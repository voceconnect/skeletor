<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package skeletor
 */
?>
<aside class="sidebar" role="complementary">
	<?php do_action( 'before_sidebar' ); ?>
	<?php if ( !dynamic_sidebar( 'sidebar-1' ) ) : ?>

		<aside id="archives" class="widget">
			<h3><?php _e( 'Archives', 'skeletor' ); ?></h3>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>

	<?php endif; // end sidebar widget area ?>
</aside><!-- #secondary -->
