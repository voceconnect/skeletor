<?php get_header(); ?>
<section class="row" role="main">
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
</section> <!-- end well -->
<?php
//get_sidebar();
get_footer();

