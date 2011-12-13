<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <h1 class="pagetitle"><?php the_title(); ?></h1>
    <div class="post-entry">
        <?php the_content(__('Read the rest of this entry &raquo;', 'skeletor')); ?>
        <div class="clr"></div>
        <?php edit_post_link(__('Edit', 'skeletor'), '<p>', '</p>'); ?>
    </div> <!-- end post-entry -->
</div> <!-- end post -->
