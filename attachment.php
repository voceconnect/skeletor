<?php get_header(); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12" role="main" id="primary">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'attachment' ); ?>

					<?php
					// Get the parent post ID
					$parent_id = $post->post_parent;
					// Get the parent post Title
					$parent_title = get_the_title( $parent_id );
					// Get the parent post permalink
					$parent_permalink = get_permalink( $parent_id );

					if ( $parent_permalink ) {
						echo '<p><a href="' . $parent_permalink . '">&larr; ' . $parent_title . '</a></p>';
					}
					?>
				<?php endwhile; // end of the loop. ?>

			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>