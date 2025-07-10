<?php get_header(); ?>

	<main id="primary" class="single-works-main site-main">
	<?php
		the_title( '<h1 class="entry-title">', '</h1>' );
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	the_content(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'makokamiya-wp-theme' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			wp_kses_post( get_the_title() )
		)
	);
	?>
	</article><!-- #post-<?php the_ID(); ?> -->
	</main>

<?php get_footer();