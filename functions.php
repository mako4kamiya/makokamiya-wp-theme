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

    // swiper style
	wp_enqueue_style( 'swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0' );
	
	// Swiper JS
	wp_enqueue_script( 'swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true );

    // custom.css
    wp_enqueue_style( 'makokamiya-wp-theme-custom', get_template_directory_uri() . '/css/custom.css', array(), _S_VERSION );

	// custom.js
    wp_enqueue_script(
        'makokamiya-custom-js',
        get_template_directory_uri() . '/js/custom.js',
        array(), // 依存ファイルがあればここに
        _S_VERSION,
        true // フッターで読み込む場合はtrue
    );

    // cssに画像を登録
    $xIcon_url = get_template_directory_uri() . '/images/icons/x_icon.png';
    wp_add_inline_style( 'makokamiya-wp-theme-style', "
        .menu-icon-x > a {
            background-image: url('$xIcon_url');
        }
    " );
    
    $menuIcon_url = get_template_directory_uri() . '/images/icons/menu_icon.png';
    wp_add_inline_style( 'makokamiya-wp-theme-style', "
        @media screen and (max-width: 768px) {
            header button {
                background-image: url('$menuIcon_url');
            }
        }
    " );
    
    $closeIcon_url = get_template_directory_uri() . '/images/icons/close_icon.png';
    wp_add_inline_style( 'makokamiya-wp-theme-style', "
        @media screen and (max-width: 768px) {
        header nav.main-navigation.toggled button {
                background-image: url('$closeIcon_url');
            }
        }
    " );

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
            'label' => 'Works', // 管理画面メニューなどに表示される投稿タイプの名前
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
			'rewrite' => array('slug' => 'works-tag'), // URLスラグ
            'show_in_rest' => true, // ブロックエディタ対応
        )
    );
}
add_action( 'init', 'makokamiya_register_taxonomy_works_tag' );

/**
 * カスタムタクソノミー「works_role」を追加
 */
function makokamiya_register_taxonomy_works_role() {
    register_taxonomy(
        'works_role', 
        'works',
        array(
            'label' => '役割',
            'hierarchical' => false, // trueにするとカテゴリー型、falseでタグ型
			'rewrite' => array('slug' => 'role'), // URLスラグ
            'show_in_rest' => true, // ブロックエディタ対応
        )
    );
}
add_action( 'init', 'makokamiya_register_taxonomy_works_role' );

/**
 * カスタムタクソノミー「tools」を追加
 */
function makokamiya_register_taxonomy_works_tools() {
	register_taxonomy(
		'works_tools',
		'works',
		array(
			'label' => 'ツール',
			'hierarchical' => false, // タグ形式（非階層）
			'rewrite' => array('slug' => 'tool'), // URLスラグ
			'show_in_rest' => true, // Gutenberg対応
		)
	);
}
add_action('init', 'makokamiya_register_taxonomy_works_tools');

/**
 * カスタムタフィールド「URL」「制作時間」「要約文」を追加
 */
function register_custom_fields_for_rest() {
	// 「URL」の登録
    register_post_meta(
        'works', // 対象投稿タイプ
        'url', // メタキー
        array(
            'description' => '関連URL', // 説明
            'single' => true, // 単一値
            'type' => 'string', // データ型
            'show_in_rest' => true, // Gutenbergで表示
        )
    );

    // 「制作時間」の登録
    register_post_meta(
        'works', // 対象投稿タイプ
        'production_time', // メタキー
        array(
            'description' => '制作時間', // 説明
            'single' => true, // 単一値
            'type' => 'string', // データ型
            'show_in_rest' => true, // Gutenbergで表示
        )
    );

    // 「要約文」の登録
    register_post_meta(
        'works',
        'summary',
        array(
            'description' => '作品の要約文',
            'single' => true,
            'type' => 'string',
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'register_custom_fields_for_rest');

/**
 * カスタムメタボックス「作品情報（URL・制作時間・要約文）」を追加
 */
function add_works_custom_fields() {
    add_meta_box(
        'works_custom_fields', // メタボックスID
        '作品情報', // タイトル
        'render_works_custom_fields', // ← 修正：コールバック関数を指定
        'works', // 対象投稿タイプ
        'normal', // 表示位置
        'default' // 優先度
    );
}
add_action('add_meta_boxes', 'add_works_custom_fields');

/**
 * カスタムフィールドの表示
 */
function render_works_custom_fields($post) {
    // セキュリティ用のnonceを追加
    wp_nonce_field('works_custom_fields_nonce', 'works_custom_fields_nonce');

    // 保存済みの値を取得
    $production_time = get_post_meta($post->ID, 'production_time', true);
    $summary = get_post_meta($post->ID, 'summary', true);
    $url = get_post_meta($post->ID, 'url', true); // ← ここを追加
    ?>
    <table class="form-table">
		<tr>
            <th><label for="url">関連URL</label></th> 
            <td>
                <input type="url" id="url" name="url" value="<?php echo esc_url($url); ?>" />
                <p class="description">作品の関連URLを入力してください。</p>
            </td>
        </tr>
        <tr>
            <th><label for="production_time">制作時間</label></th>
            <td>
                <input type="text" id="production_time" name="production_time" value="<?php echo esc_attr($production_time); ?>" />
                <p class="description">例: 30時間</p>
            </td>
        </tr>
        <tr>
            <th><label for="summary">要約文</label></th>
            <td>
                <textarea id="summary" name="summary" rows="4" cols="50"><?php echo esc_textarea($summary); ?></textarea>
                <p class="description">作品の簡単な説明を入力してください。</p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * カスタムフィールドの保存処理
 */
function save_works_custom_fields($post_id) {
    // リクエストの正当性を確認
    if (!isset($_POST['works_custom_fields_nonce']) || !wp_verify_nonce($_POST['works_custom_fields_nonce'], 'works_custom_fields_nonce')) {
        return;
    }

    // 自動保存時や不正なアクセスを除外
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

	// 「URL」の保存
    if (isset($_POST['url'])) {
        update_post_meta($post_id, 'url', sanitize_url($_POST['url']));
    }

    // 「制作時間」の保存
    if (isset($_POST['production_time'])) {
        update_post_meta($post_id, 'production_time', sanitize_text_field($_POST['production_time']));
    }

    // 「要約文」の保存
    if (isset($_POST['summary'])) {
        update_post_meta($post_id, 'summary', sanitize_textarea_field($_POST['summary']));
    }
}
add_action('save_post', 'save_works_custom_fields');

/**
 * カスタムブロックパターンを登録
 */
function makokamiya_register_block_patterns() {
    // カスタムブロックパターンカテゴリーを登録
    register_block_pattern_category(
        'makokamiya-patterns',
        array(
            'label' => __('makokamiya-wp-theme用', 'makokamiya-wp-theme'), // カテゴリー名
        )
    );

    // デフォルトブロックパターンを登録
    register_block_pattern(
        'makokamiya-wp-theme/default-pattern', // パターンのスラッグ
        array(
            'title'       => __('デフォルトパターン', 'makokamiya-wp-theme'), // パターンのタイトル
            'description' => _x('画像とテキストを含むデフォルトのブロックパターンです。', 'ブロックパターンの説明', 'makokamiya-wp-theme'), // パターンの説明
            'categories'  => array('makokamiya-patterns'), // カテゴリーを指定
            'content'     => '
                <!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
                <div class="wp-block-group alignwide">
                    <!-- wp:image {"sizeSlug":"large"} -->
                    <figure class="wp-block-image size-large">
                        <img src="' . get_template_directory_uri() . '/images/default-img.png" alt="デフォルト画像"/>
                    </figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"layout":{"type":"default"}} -->
                    <div class="wp-block-group">
                        <!-- wp:heading {"level":2} -->
                        <h2>作品の概要</h2>
                        <!-- /wp:heading -->
                        
                        <!-- wp:paragraph -->
                        <p>この作品は、クライアントの要望に応じて制作したWebサイトです。レスポンシブデザインを採用し、スマートフォンやタブレットでも快適に閲覧できるよう工夫しました。</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"layout":{"type":"default"}} -->
                    <div class="wp-block-group">
                        <!-- wp:heading {"level":2} -->
                        <h2>こだわったポイント</h2>
                        <!-- /wp:heading -->
                        
                        <!-- wp:list -->
                        <ul>
                            <li>ユーザビリティを重視した直感的なナビゲーション</li>
                            <li>読みやすいフォントと適切な行間の設定</li>
                            <li>高速なページロードを実現する画像最適化</li>
                        </ul>
                        <!-- /wp:list -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            ',
        )
    );
}
add_action('init', 'makokamiya_register_block_patterns');
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