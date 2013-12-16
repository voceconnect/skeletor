<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package skeletor
 */

get_header(); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-lg-8" role="main" id="primary">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>

			<?php endwhile; // end of the loop. ?>
			
			</div>
			<?php get_sidebar();?>
		</div>
	</div>
</section>

<?php
get_footer();