<?php get_header(); ?>

	<div class="well" role="main">

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part( 'post-loop' );?>
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries','skeletor')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;','skeletor')) ?></div>
			<div class="clr"></div>
		</div>

	<?php else : ?>

		<h1 class="pagetitle"><?php _e('Not Found', 'skeletor');?></h1>
		<p><?php _e("Sorry, but you are looking for something that isn't here.","skeletor");?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
