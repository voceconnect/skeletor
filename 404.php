<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package skeletor
 */
get_header();
?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md012" role="main" id="primary">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'skeletor' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'skeletor' ); ?></p>

						<?php get_search_form(); ?>

						<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

						<?php if ( skeletor_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
							<div class="widget widget_categories">
								<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'skeletor' ); ?></h2>
								<ul class="category-buttons">
									<?php
									wp_list_categories( array(
										'orderby' => 'count',
										'order' => 'DESC',
										'show_count' => 0,
										'title_li' => '',
										'number' => 10,
									) );
									?>
								</ul>
							</div><!-- .widget -->
						<?php endif; ?>

						<?php
						/* translators: %1$s: smiley */
						$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'skeletor' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
						?>

						<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();