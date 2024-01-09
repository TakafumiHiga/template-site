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
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_script_init()
{
	wp_enqueue_style( 'my_style', get_template_directory_uri() . '/assets/css/styles.css', array(), '1.0.1', 'all' );
	wp_enqueue_style( 'swiper-css','https://unpkg.com/swiper/swiper-bundle.min.css', array(), '1.0.1', 'all' );
	// wp_enqueue_style( 'my', get_template_directory_uri() . '/assets/css/styles.css', array('swiper-js'), '1.0.1', 'all' );
	
	wp_enqueue_script( 'swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array( 'jquery' ), '1.0.1', true );
	wp_enqueue_script( 'my', get_template_directory_uri() . '/assets/js/script.js', array( 'swiper-js','jquery' ), '1.0.1', true );

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

// 子メニュー時にトグルを付与
function add_submenu_toggle($items) {
	foreach ($items as $item) {
			if (in_array('menu-item-has-children', $item->classes)) {
					$item->title .= '<span class="submenu-toggle"></span>';
			}
	}
	return $items;
}
add_filter('wp_nav_menu_objects', 'add_submenu_toggle');


//MW WPFrom に　readonly 属性を追加
function my_mwform_input_shortcode_tag( $output, $tag, $attr ) {
	if ( $tag == 'mwform_text' && $attr['name'] == 'セミナー名' ) {
		$output = str_replace( '<input ', '<input readonly ', $output );
	}
		if ( $tag == 'mwform_text' && $attr['name'] == '開催日時' ) {
		$output = str_replace( '<input ', '<input readonly ', $output );
	}
		if ( $tag == 'mwform_text' && $attr['name'] == '講師名' ) {
		$output = str_replace( '<input ', '<input readonly ', $output );
	}
	return $output;
}
add_filter( 'do_shortcode_tag', 'my_mwform_input_shortcode_tag', 10, 3 );

// カスタム投稿追加　セミナー
add_action('init', function(){
  register_post_type('seminar_info',[
    'label' => 'セミナー',
    'public' => true,
    'menu_position' => 10,
    'has_archive' => true,
    'hierarchical' => true,
    'show_in_rest' =>true,
    'supports' => ['thumbnail', 'title', 'editor','custom-fields'],
  ]);
    // カスタム分類を追加
    register_taxonomy('seminar_genru', 'seminar_info', [
      'label' => 'セミナーの種類',
      'public'            => true,
      'hierarchical'      => true,
      'show_ui'           => true,
      'query_var'         => true,
      'rewrite'           => true,
      'singular_label'    => '記事カテゴリ',
      'show_in_rest'      => true, //追記
      'show_admin_column' => true
    ]);
});

// カスタム投稿を追加（制作事例）
add_action('init', function(){
  register_post_type('works',[
    'label' => '制作事例',
    'public' => true,
    'menu_position' => 5,
    'has_archive' => true,
    'hierarchical' => true,
    'show_in_rest' =>true,
    'supports' => ['thumbnail', 'title', 'editor','custom-fields'],
  ]);
    // カスタム分類を追加
    register_taxonomy('works-cat', 'works', [
      'label' => '制作事例',
      'public'            => true,
      'hierarchical'      => true,
      'show_ui'           => true,
      'query_var'         => true,
      'rewrite'           => true,
      'singular_label'    => '記事カテゴリ',
      'show_in_rest'      => true, //追記
      'show_admin_column' => true
    ]);
});

/* 投稿アーカイブを有効にしてスラッグを指定する */
function post_has_archive( $args, $post_type ) {

	if ( 'post' == $post_type ) {
			$args['rewrite'] = true;
			$args['has_archive'] = ''; 
			$args['label'] = 'ブログ';
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
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );