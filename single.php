<?php get_header(); ?>
<div class="well" role="main">
    <?php
    if (have_posts()) : while (have_posts()) : the_post();
            get_template_part('post-loop');
            wp_link_pages($args);
            comments_template();
        endwhile;
    else:
        ?>
        <h1>Sorry, no posts matched your criteria.</h1>
    <?php endif; ?>
</div> <!-- end well -->
<?php
get_sidebar();
get_footer();

