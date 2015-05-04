<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package skeletor
 */
get_header();
?>

<section>
	<div class="container">
		<div class="row archive-page">
			<div class="col-sm-8" role="main" id="primary">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title">
							<?php
							if ( is_category() ) :
								single_cat_title();

							elseif ( is_tag() ) :
								single_tag_title();

							elseif ( is_author() ) :
								/* Queue the first post, that way we know
								 * what author we're dealing with (if that is the case).
								 */
								the_post();
								printf( esc_html__( 'Author: %s', 'skeletor' ), '<span class="vcard">' . esc_html( get_the_author() ) . '</span>' );
								/* Since we called the_post() above, we need to
								 * rewind the loop back to the beginning that way
								 * we can run the loop properly, in full.
								 */
								rewind_posts();

							elseif ( is_day() ) :
								printf( esc_html__( 'Day: %s', 'skeletor' ), '<span>' . get_the_date() . '</span>' );

							elseif ( is_month() ) :
								printf( esc_html__( 'Month: %s', 'skeletor' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

							elseif ( is_year() ) :
								printf( esc_html__( 'Year: %s', 'skeletor' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								esc_html_e( 'Asides', 'skeletor' );

							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								esc_html_e( 'Images', 'skeletor' );

							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								esc_html_e( 'Videos', 'skeletor' );

							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								esc_html_e( 'Quotes', 'skeletor' );

							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								esc_html_e( 'Links', 'skeletor' );

							else :
								esc_html_e( 'Archives', 'skeletor' );

							endif;
							?>
						</h1>
						<?php
						// Show an optional term description.
						$term_description = term_description();
						if ( !empty( $term_description ) ) :
							printf( '<div class="taxonomy-description">%s</div>', $term_description );
						endif;
						?>
					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
						?>

					<?php endwhile; ?>

					<?php skeletor_content_nav( 'nav-below' ); ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

			</div>
			<div class="col-sm-4" id="secondary">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();