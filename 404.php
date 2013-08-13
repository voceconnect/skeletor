<?php get_header(); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-lg-8" role="main">
				<?php get_template_part( 'tmpl/post-empty' ); ?>
			</div>
			<?php get_sidebar();?>
		</div>
	</div>
</section>

<?php
get_footer();