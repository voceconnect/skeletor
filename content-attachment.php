<?php
/**
 * @package _skeletor
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content attachment-container">
		<?php echo wp_get_attachment_image( get_the_ID(), 'full' );?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
