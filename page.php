<?php get_header(); ?>

<div class="well" role="main">
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'tmpl/page-loop' ); ?>
        <?php
        endwhile;
    endif;
    ?>
</div> <!-- end well -->

<?php
get_sidebar();
get_footer();

