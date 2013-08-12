<?php get_header(); ?>
	<section role="main">
		<div class="container">
			<div class="row">
				<div class="col-8">
				    <?php
				    if( have_posts() ) :
				        while( have_posts() ) : the_post();
				            get_template_part( 'tmpl/post-loop' );
				        endwhile;
				        get_template_part( 'tmpl/navigation' );
				    else :
				        get_template_part( 'tmpl/post-empty' );
				    endif;
				    ?>
				</div>
				<?php get_sidebar();?>
			</div>
		</div>
	</section>

<?php
get_footer();

