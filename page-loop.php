<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<h1 class="pagetitle"><?php the_title();?></h1>
	<div class="post-entry">
		<?php the_content('Read the rest of this entry &raquo;'); ?>
		<div class="clr"></div>
		<?php edit_post_link('Edit', '<p>', '</p>'); ?>
	</div>
</div>
