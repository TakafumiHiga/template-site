<?php
/**
 * Functions
 */

/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'my_setup' );



/**
 * CSSとJavaScriptの読み込み
 *
 * https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 * 
 * wp_enqueue_style( $handle（※必須 固有名詞、読み込む順番のため）, $src（※必須 パス）, $deps（依存関係の指定、例：cssの読み込む順番の指定）, $ver（スタイルシートのバージョンを指定）, $media（※初期値allで記載不要） );
 * 
 * wp_enqueue_script( $handle, $src, $deps, $ver, $args );$handleと$srcだけでもOK
 * 
 */
function my_script_init()
{
// css
wp_enqueue_style( 'my_style', get_template_directory_uri() . '/assets/css/styles.css', array(), '');

//配列にして特定のページにだけにスタイルを読み込む
if(is_page(array('contact', 'confirm', 'thanks'))) {
	wp_enqueue_style('contact_style', get_template_directory_uri() . '/assets/css/form-reset.css', array(),'');
}

// Swiperのスタイルシートを追加
wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '');

// 外部からのjQueryを読み込む
wp_enqueue_script( 'jquery-external', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '', true );

// Swiperのスクリプトを追加
wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '10.0.0', true );

//min.jsを使う場合はminに変更
// 独自のスクリプト（'jquery-external'に依存）
wp_enqueue_script( 'my_js', get_template_directory_uri() . '/assets/js/script.min.js', array(), '1.0.0', true );

wp_enqueue_script( 'my_swiper_js', get_template_directory_uri() . '/assets/js/swiper.js', array(), '', true );

}
add_action('wp_enqueue_scripts', 'my_script_init');




/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
function my_menu_init() {
	register_nav_menus(
		array(
	 			'global'  => 'ヘッダーメニュー',
				'utility' => 'ユーティリティメニュー',
				'drawer'  => 'ドロワーメニュー',
				'footer'  => 'フッターメニュー',
 					)
 		);
 	}
	add_action( 'init', 'my_menu_init' );
/**
 * メニューの登録
 *
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */


/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
function my_widget_init() {
	register_sidebar(
		array(
			'name'          => 'サイドバー',
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="p-widget__title">',
			'after_title'   => '</div>',
		)
	);
}
add_action( 'widgets_init', 'my_widget_init' );


/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
function my_archive_title( $title ) {

	if ( is_home() ) { /* ホームの場合 */
		$title = 'ブログ';
	} elseif ( is_category() ) { /* カテゴリーアーカイブの場合 */
		$title = '' . single_cat_title( '', false ) . '';
	} elseif ( is_tag() ) { /* タグアーカイブの場合 */
		$title = '' . single_tag_title( '', false ) . '';
	} elseif ( is_post_type_archive() ) { /* 投稿タイプのアーカイブの場合 */
		$title = '' . post_type_archive_title( '', false ) . '';
	} elseif ( is_tax() ) { /* タームアーカイブの場合 */
		$title = '' . single_term_title( '', false );
	} elseif ( is_search() ) { /* 検索結果アーカイブの場合 */
		$title = '「' . esc_html( get_query_var( 's' ) ) . '」の検索結果';
	} elseif ( is_author() ) { /* 作者アーカイブの場合 */
		$title = '' . get_the_author() . '';
	} elseif ( is_date() ) { /* 日付アーカイブの場合 */
		$title = '';
		if ( get_query_var( 'year' ) ) {
			$title .= get_query_var( 'year' ) . '年';
		}
		if ( get_query_var( 'monthnum' ) ) {
			$title .= get_query_var( 'monthnum' ) . '月';
		}
		if ( get_query_var( 'day' ) ) {
			$title .= get_query_var( 'day' ) . '日';
		}
	}
	return $title;
};
add_filter( 'get_the_archive_title', 'my_archive_title' );


/**
 * 抜粋文の文字数の変更
 *
 * @param int $length 変更前の文字数.
 * @return int $length 変更後の文字数.
 */
function my_excerpt_length( $length ) {
	return 80;
}
add_filter( 'excerpt_length', 'my_excerpt_length', 999 );


/**
 * 抜粋文の省略記法の変更
 *
 * @param string $more 変更前の省略記法.
 * @return string $more 変更後の省略記法.
 */
function my_excerpt_more( $more ) {
	return '...';

}
add_filter( 'excerpt_more', 'my_excerpt_more' );

//body classにurlのclassを付与
function pagename_class($classes = ''){
  if ( !(is_home() || is_front_page())) {
    $page = get_post();
    $classes[] = $page->post_name; //スラッグ名取得
  }
  return $classes;
}
add_filter('body_class', 'pagename_class');


// wp_nav_menuのliにclass追加
function add_additional_class_on_li($classes, $item, $args)
{
  if (isset($args->add_li_class)) {
    $classes['class'] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// wp_nav_menuのaにclass追加
function add_additional_class_on_links($atts, $item, $args) {
  if (isset($args->add_a_class)) {
    $atts['class'] = $args->add_a_class;
  }
  return $atts;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_links', 1, 3);

/************************************************
 * 子メニュー時にトグルを付与子メニュー時にトグルを付与
 */

function add_submenu_toggle($items) {
	foreach ($items as &$item) {
		if ($item->menu_item_parent == 0 && in_array('menu-item-has-children', $item->classes)) {
			$item->title .= '<span class="submenu-toggle"></span>';
		}
	}
	return $items;
}
add_filter('wp_nav_menu_objects', 'add_submenu_toggle');



/* 投稿アーカイブを有効にしてスラッグを指定する */
function post_has_archive( $args, $post_type ) {

	if ( 'post' == $post_type ) {
			$args['rewrite'] = true;
			$args['has_archive'] = ''; 
			$args['label'] = '投稿';
	}
	return $args;
}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );


/* 固定ページ一覧にスラッグを追加する */
function add_page_column_slug_title( $columns ) {
	$columns[ 'slug' ] = "スラッグ";
	return $columns;
}
function add_page_column_slug( $column_name, $post_id ) {
	if( $column_name == 'slug' ) {
		$post = get_post( $post_id );
		$slug = $post->post_name;
		echo esc_attr( $slug );
	}
}
add_filter( 'manage_pages_columns', 'add_page_column_slug_title' );
add_action( 'manage_pages_custom_column', 'add_page_column_slug', 10, 2 );

/************************************************
 * YubinBangoライブラリ
 */
wp_enqueue_script( 'yubinbango', 'https://yubinbango.github.io/yubinbango/yubinbango.js', array(), null, true );



/**********************************************
* スラッグ名が日本語だったら自動的に投稿タイプ＋id付与へ変更（スラッグを設定した場合は適用しない）
*/
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
	if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
			$slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
	}
	return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4);


/**********************************************
* noindex付与
*/
//function post_type_noindex(){
	//if(is_singular('inside') || is_post_type_archive('inside') || is_tax('inside_cat')){
	//echo'<meta name="robots" content="noindex , nofollow" />';
	//}}add_action('we_head', 'post_type_noindex');