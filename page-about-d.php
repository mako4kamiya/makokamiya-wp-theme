<?php get_header(); ?>

	<main id="primary" class="page-about-main site-main">
        <div class="h1_group">
            <h1>ABOUT</h1>
            <span>わたしについて</span>
        </div>
        <div class="text_group">
			<?php $admin_user = get_user_by('login', 'makokamiyalocal'); ?>
			<?php
			if ($admin_user) :
				$author_id = $admin_user->ID;
				echo get_avatar($author_id, 96);
			?>
			<div class="text_field">
			<?php 
				echo '<h2>' . esc_html(get_the_author_meta('display_name', $author_id)) . '</h2>';
				the_content();
			?>
			</div>
			<?php
			else :
				echo '<p>管理者ユーザーが見つかりません。</p>';
			endif ;
			?>
        </div>
		<?php makokamiya_wp_theme_breadcrumbs(); ?>
	</main>

<?php get_footer();