<div <?php post_class('loop-item'); ?> id="post-<?php the_ID(); ?>">
    <?php if( is_single() ) : ?>
        <h1><?php the_title(); ?></h1>
    <?php else : ?>
        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to ', 'skeletor' ); ?><?php the_title_attribute( 'echo=0' ); ?>"><?php the_title(); ?></a></h2>
    <?php endif; ?>
    <small><?php the_time( 'F jS, Y' ) ?> <!-- by <?php the_author() ?> --></small>
    <div class="post-entry">
        <?php if( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail() ) : the_post_thumbnail();
        endif;
        ?>
<?php the_content( 'Read the rest of this entry &raquo;' ); ?>
        <div class="clr"></div>
    </div> <!-- end post-entry -->
    <p class="postmetadata"><?php the_tags( __( 'Tags: ', 'skeletor' ), ', ', '<br />' ); ?> <?php _e( 'Posted in', 'skeletor' ); ?> <?php echo get_the_category_list( ', ' ); ?> | <?php edit_post_link( __( 'Edit', 'skeletor' ), '', ' | ' ); ?>  <?php comments_popup_link( __( 'Add a Comment', 'skeletor' ), __( '1 Comment', 'skeletor' ), __( '% Comments', 'skeletor' ), '', __( 'Comments Closed', 'skeletor' ) ); ?></p>
</div> <!-- end post -->