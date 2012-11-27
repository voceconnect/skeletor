<?php get_header(); ?>

<div class="span8 well" role="main">

    <?php if( have_posts() ) : ?>

        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
        <?php /* If this is a category archive */ if( is_category() ) : ?>
            <h1><?php printf( __( 'Archive for the &#8216;%s&#8217; Category', 'skeletor' ), single_cat_title( '', false ) ); ?></h1>
            <?php
        /* If this is a tag archive */
        elseif( is_tag() ) :
            ?>
            <h1><?php printf( __( 'Posts Tagged &#8216;%s&#8217;', 'skeletor' ), single_tag_title( '', false ) ); ?></h1>
            <?php
        /* If this is a daily archive */
        elseif( is_day() ) :
            ?>
            <h1><?php printf( __( 'Archive for %s|Daily archive page', 'skeletor' ), get_the_time( 'F jS, Y' ) ); ?></h1>
            <?php
        /* If this is a monthly archive */
        elseif( is_month() ) :
            ?>
            <h1><?php printf( __( 'Archive for %s|Monthly archive page', 'skeletor' ), get_the_time( 'F, Y' ) ); ?></h1>
            <?php
        /* If this is a yearly archive */
        elseif( is_year() ) :
            ?>
            <h1><?php printf( __( 'Archive for %s|Yearly archive page', 'skeletor' ), get_the_time( 'Y' ) ); ?></h1>
            <?php
        /* If this is an author archive */
        elseif( is_author() ) :
            ?>
            <h1><?php _e( 'Author Archive', 'skeletor' ); ?></h1>
            <?php
        /* If this is a paged archive */
        elseif( isset( $_GET['paged'] ) && !empty( $_GET['paged'] ) ) :
            ?>
            <h1><?php _e( 'Blog Archives', 'skeletor' ); ?></h1>
        <?php
        endif;
        while( have_posts() ) : the_post();
            get_template_part( 'tmpl/post-loop' );
        endwhile;
        get_template_part( 'tmpl/navigation.php' );
    else :
        get_template_part( 'tmpl/post-empty' );
    endif;
    ?>
</div> <!-- end well -->

<?php
get_sidebar();
get_footer();
