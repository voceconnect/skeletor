<?php get_header(); ?>

<section class="row" role="main">
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'tmpl/page-loop' ); ?>
        <?php
        endwhile;
    endif;
    ?>
</section> <!-- end section -->

<?php
//get_sidebar();
get_footer();

