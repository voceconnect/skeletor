<?php get_header(); ?>

<div class="well" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php get_template_part('page-loop'); ?>
        <?php endwhile;
    endif; ?>
</div> <!-- end well -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
