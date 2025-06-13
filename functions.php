<?php
/**
 * Mako Kamiya WP Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mako_Kamiya_WP_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function makokamiya_wp_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Mako Kamiya WP Theme, use a find and replace
		* to change 'makokamiya-wp-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'makokamiya-wp-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'makokamiya-wp-theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'makokamiya_wp_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'makokamiya_wp_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function makokamiya_wp_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'makokamiya_wp_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'makokamiya_wp_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function makokamiya_wp_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'makokamiya-wp-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'makokamiya-wp-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'makokamiya_wp_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function makokamiya_wp_theme_scripts() {
	wp_enqueue_style( 'makokamiya-wp-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'makokamiya-wp-theme-style', 'rtl', 'replace' );

    // custom.css を追加
    wp_enqueue_style( 'makokamiya-wp-theme-custom', get_template_directory_uri() . '/css/custom.css', array(), _S_VERSION );

	wp_enqueue_script( 'makokamiya-wp-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'makokamiya_wp_theme_scripts' );

/**
 * カスタム投稿タイプ「works」を追加
 */
function makokamiya_register_post_type_works() {
    register_post_type(
        'works',
        array(
            'label' => 'WORKS', // 管理画面メニューなどに表示される投稿タイプの名前
            'public' => true, // サイト上・管理画面の両方で公開（trueで一般公開、falseで非公開）
            'has_archive' => true, // 一覧ページ（アーカイブ）を自動生成（例: /works/ で一覧表示）
            'menu_position' => 5, // 管理画面メニューの表示位置（数字が小さいほど上に表示）
            'menu_icon' => 'dashicons-portfolio', // 管理画面メニューで使うアイコン（WordPress標準アイコン）
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ), // 投稿画面で使える機能（タイトル、本文、アイキャッチ画像、抜粋）
            'show_in_rest' => true, // ブロックエディタ（Gutenberg）やREST APIに対応
        )
    );
}
add_action( 'init', 'makokamiya_register_post_type_works' );

/**
 * カスタムタクソノミー「works_tag」を追加
 */
function makokamiya_register_taxonomy_works_tag() {
    register_taxonomy(
        'works_tag',
        'works',
        array(
            'label' => 'タグ',
            'hierarchical' => false, // trueにするとカテゴリー型、falseでタグ型
            'show_in_rest' => true, // ブロックエディタ対応
        )
    );
}
add_action( 'init', 'makokamiya_register_taxonomy_works_tag' );

/**
 * カスタムタクソノミー「works_tag」を追加
 */
function makokamiya_register_taxonomy_role() {
    register_taxonomy(
        'works_role', 
        'works',
        array(
            'label' => '役割',
            'hierarchical' => false, // trueにするとカテゴリー型、falseでタグ型
            'show_in_rest' => true, // ブロックエディタ対応
        )
    );
}
add_action( 'init', 'makokamiya_register_taxonomy_role' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * ダミーデータ
 */
// add_action('init', function() {
//     if ( !get_option('works_test_data_inserted') ) {
//         for ($i = 1; $i <= 5; $i++) {
//             $post_id = wp_insert_post(array(
//                 'post_title'   => "テスト作品{$i}",
//                 'post_type'    => 'works',
//                 'post_status'  => 'publish',
//                 'post_content' => "これはテスト作品{$i}の説明です。",
//             ));
//             // タグや役割（タクソノミー）があれば追加
//             if ($post_id && !is_wp_error($post_id)) {
//                 wp_set_object_terms($post_id, array('test-tag'), 'works_tag');
//                 wp_set_object_terms($post_id, array('test-role'), 'works_role');
//                 set_post_thumbnail($post_id, 25);
//             }
//         }
//         update_option('works_test_data_inserted', 1);
//     }
// });

/**
 * ダミーデータ投入フラグをリセット（1回だけ実行）
 */
// delete_option('works_test_data_inserted');