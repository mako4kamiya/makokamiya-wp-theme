<?php get_header(); ?>

	<main id="primary" class="about site-main">
        <div class="h2_group">
            <h1>ABOUT</h1>
            <span>わたしについて</span>
        </div>
        <div class="text_group">
			<?php
			$author_id = get_the_author_meta('ID');
			echo get_avatar($author_id, 96);
			echo '<h2>' . get_the_author_meta('display_name') . '</h2>';
			echo '<p>' . get_the_author_meta('description') . '</p>';
			?>
			<?php the_content(); ?>
            </div>
        </div>
		<?php makokamiya_wp_theme_breadcrumbs(); ?>
	</main>

<?php get_footer();