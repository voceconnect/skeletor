<?php get_header(); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-lg-8" role="main">
	    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
	            <?php get_template_part( 'tmpl/page-loop' ); ?>
	        <?php
	        endwhile;
	    endif;
	    ?>
			</div>
			<?php get_sidebar();?>
		</div>
	</div>
</section> <!-- end section -->

<?php
get_footer();