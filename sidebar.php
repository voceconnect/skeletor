<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package skeletor
 */
?>
	<aside class="col-sm-4 col-lg-4" role="complementary" id="secondary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h3><?php _e( 'Archives', 'skeletor' ); ?></h3>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>


		<?php endif; // end sidebar widget area ?>
	</aside><!-- #secondary -->
