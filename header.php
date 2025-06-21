<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'makokamiya-wp-theme' ); ?></a>

	<?php if( is_front_page() || is_singular('works') || is_post_type_archive('works') || is_page('about') ) : ?>
		<div class="flames is-pc">
			<div class="frame right"></div>
			<div class="frame Left"></div>
			<div class="line top"></div>
			<div class="line right"></div>
			<div class="line left"></div>
			<div class="line bottom"></div>
		</div>
	<?php endif; ?>
	<header id="masthead" class="theme-header site-header">
		<div class="site-branding">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a id="HeaderLogo" href="<?php echo esc_url( home_url( '/' ) ); ?>">MAKO KAMIYA</a></h1>
			<?php else :?>
				<p class="site-title"><a id="HeaderLogo" href="<?php echo esc_url( home_url( '/' ) ); ?>">MAKO KAMIYA</a></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->