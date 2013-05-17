<?php get_header(); ?>
	<section class="row" role="main">
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
	</section>

<?php
//get_sidebar();
get_footer();

