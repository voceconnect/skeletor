<?php get_header();?>

	<div class="well" role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php get_template_part( 'post-loop' );?>
		<?php comments_template(); ?>
	<?php endwhile; else: ?>

		<h1 class="pagetitle">Sorry, no posts matched your criteria.</h1>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
