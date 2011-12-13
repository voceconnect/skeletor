<?php get_header(); ?>

<div class="well" role="main">

    <?php if (have_posts()) : ?>

        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
        <?php /* If this is a category archive */ if (is_category()) { ?>
            <h1 class="pagetitle"><?php printf(__('Archive for the &#8216;%s&#8217; Category', 'skeletor'), single_cat_title('', false)); ?></h1>
        <?php /* If this is a tag archive */
        } elseif (is_tag()) { ?>
            <h1 class="pagetitle"><?php printf(__('Posts Tagged &#8216;%s&#8217;', 'skeletor'), single_tag_title('', false)); ?></h1>
        <?php /* If this is a daily archive */
        } elseif (is_day()) { ?>
            <h1 class="pagetitle"><?php printf(__('Archive for %s|Daily archive page', 'skeletor'), get_the_time('F jS, Y')); ?></h1>
        <?php /* If this is a monthly archive */
        } elseif (is_month()) { ?>
            <h1 class="pagetitle"><?php printf(__('Archive for %s|Monthly archive page', 'skeletor'), get_the_time('F, Y')); ?></h1>
        <?php /* If this is a yearly archive */
        } elseif (is_year()) { ?>
            <h1 class="pagetitle"><?php printf(__('Archive for %s|Yearly archive page', 'skeletor'), get_the_time('Y')); ?></h1>
        <?php /* If this is an author archive */
        } elseif (is_author()) { ?>
            <h1 class="pagetitle"><?php _e('Author Archive', 'skeletor'); ?></h1>
        <?php /* If this is a paged archive */
        } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
            <h1 class="pagetitle"><?php _e('Blog Archives', 'skeletor'); ?></h1>
        <?php } ?>


    <?php while (have_posts()) : the_post(); ?>

        <?php get_template_part('post-loop'); ?>

    <?php endwhile; ?>

        <div class="navigation">
            <div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'skeletor')); ?></div>
            <div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'skeletor')); ?></div>
            <div class="clr"></div>
        </div> <!-- end navigation -->

    <?php
    else :

        if (is_category()) { // If this is a category archive
            echo('<h1 class="pagetitle">' . __("Sorry, but there aren't any posts in the", "skeletor") . single_cat_title("", false) . ' category yet.</h1>');
        } elseif (is_date()) { // If this is a date archive
            echo('<h1 class="pagetitle">' . __("Sorry, but there aren't any posts with this date.", "skeletor") . '</h1>');
        } elseif (is_author()) { // If this is a category archive
            $userdata = get_userdatabylogin(get_query_var('author_name'));
            echo('<h1 class="pagetitle">' . __("Sorry, but there aren't any posts by ", "skeletor") . $userdata->display_name . ' yet.</h1>');
        } else {
            echo('<h1 class="pagetitle">' . __("No posts found", "skeletor") . '</h1>');
        }
        get_search_form();
    endif;
    ?>
</div> <!-- end well -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
