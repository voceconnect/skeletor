<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php if(is_single()) :?>
		<h1 class="pagetitle"><?php the_title();?></h1>
	<?php else : ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute('echo=0'); ?>"><?php the_title(); ?></a></h2>
	<?php endif;?>
	<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>
	<div class="post-entry">
		<?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) : the_post_thumbnail(); endif; ?>
		<?php the_content('Read the rest of this entry &raquo;'); ?>
		<div class="clr"></div>
	</div>
	<p class="postmetadata"><?php the_tags('Tags:', ' ', ', ', '<br />'); ?> Posted in <?php echo get_the_category_list(', '); ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('Add a Comment', '1 Comment', '% Comments', '', 'Comments Closed'); ?></p>
</div>
