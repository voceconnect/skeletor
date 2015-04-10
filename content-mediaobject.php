<?php
/**
 * @package skeletor
 * The media object has an optional thumbnail on the left and a title and excerpt on the right.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('media'); ?>>
	<?php if ( has_post_thumbnail() ): ?>
	<div class="media-left">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'media-object' ) ); ?>
		</a>
	</div>
	<?php endif; ?>
	<div class="media-body">
		<h3 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php the_excerpt(); ?>
	</div>
</article><!-- .media -->
