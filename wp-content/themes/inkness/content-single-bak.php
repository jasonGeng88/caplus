<?php
/**
 * @package Inkness
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php inkness_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if (has_post_thumbnail() ) : ?>
		<div class="featured-image-single">
			<?php
				the_post_thumbnail();
				?>
		</div>
		<?php endif; ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'inkness' ),
				'after'  => '</div>',
			) );
		?>
	<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
