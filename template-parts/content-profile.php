<?php
	$admin_user = get_user_by('login', 'makokamiyalocal');
	$author_id = $admin_user->ID;
	$translation_title = get_post_meta( get_the_ID(), 'translation_title', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
            if ( $translation_title ) {
                echo '<span class="translation-title">' . esc_html( $translation_title ) . '</span>';
            }
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
			echo get_avatar($author_id, null);
			echo '<h2>' . esc_html(get_the_author_meta('display_name', $author_id)) . '</h2>';
			the_content();
		?>
	</div><!-- .entry-content -->

	<?php makokamiya_wp_theme_breadcrumbs(); ?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'makokamiya-wp-theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
