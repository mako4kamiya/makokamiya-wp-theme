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

	<div class="flames pc-only">
        <div class="frame right"></div>
        <div class="frame Left"></div>
		<div class="line top"></div>
		<div class="line right"></div>
		<div class="line left"></div>
        <div class="line bottom"></div>
    </div>
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a id="HeaderLogo" href="<?php echo esc_url( home_url( '/' ) ); ?>">MAKO KAMIYA</a></h1>
			<?php else :?>
				<p class="site-title"><a id="HeaderLogo" href="<?php echo esc_url( home_url( '/' ) ); ?>">MAKO KAMIYA</a></p>
			<?php endif; ?>				
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"> -->
				<?php 
					// esc_html_e( 'Primary Menu', 'makokamiya-wp-theme' );
				?>
			<!-- </button> -->
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		<div id="MenuButton" class="sp-only menu-toggle" aria-controls="primary-menu" aria-expanded="false">
			<?php
				// esc_html_e( 'Primary Menu', 'makokamiya-wp-theme' );
			?>
            <img class="menu" src="images/icon/button_menu_dark.png" alt="" srcset="">
            <img class="close" src="images/icon/button_close_dark.png" alt="" srcset="">
        </div>
	</header><!-- #masthead -->
