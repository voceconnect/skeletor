<?php get_header(); ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-lg-8" role="main">
		    <?php
		    if( have_posts() ) : while( have_posts() ) : the_post();
		            get_template_part( 'tmpl/post-loop' );
		            wp_link_pages( array( ) );
		            comments_template();
		        endwhile;
		    else:
		        ?>
		        <h1>Sorry, no posts matched your criteria.</h1>
		    <?php endif; ?>
			</div>
			<?php get_sidebar();?>
		</div>
	</div>
</section>
<?php
get_footer();