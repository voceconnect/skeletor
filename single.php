<?php
/**
 * The Template for displaying all single posts.
 *
 * @package skeletor
 */
get_header();
?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-8" role="main" id="primary">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>

					<?php skeletor_content_nav( 'nav-below' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) {
						comments_template();
					}
					?>

				<?php endwhile; // end of the loop. ?>

			</div>
			<div class="col-sm-4" id="secondary">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();