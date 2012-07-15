<?php get_header(); ?>

<div class="well" role="main">

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
</div> <!-- end well -->

<?php
get_sidebar();
get_footer();

