<?php
 /*
    システム内で利用する関数定義
 */
?>
<?php
//テーマのセットアップ
// HTML5でマークアップさせる
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
//headタグ内にFeedのリンクを自動で生成する
add_theme_support( 'automatic-feed-links' );
//アイキャッチ画像を使用する設定
add_theme_support( 'post-thumbnails' );
//カスタムメニュー
register_nav_menu( 'header-nav',  ' ヘッダーナビゲーション ' );
register_nav_menu( 'footer-nav',  ' フッターナビゲーション ' );
//jsの読み込み
function my_scripts_method() {
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() .'/js/jquery-3.4.1.min.js', array(), '3.4.1');
    wp_enqueue_script('underscore', get_template_directory_uri() .'/js/underscore.js', array('jquery'), '', true);
    wp_enqueue_script('prettify', get_template_directory_uri() .'/js/prettify.js', array('jquery'), '', true);
    wp_enqueue_script('lang-css', get_template_directory_uri() .'/js/lang-css.js', array('jquery'), '', true);
    wp_enqueue_script('common', get_template_directory_uri() .'/js/common.js', array('jquery'), '', true);
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
//サイドバーにウィジェット追加
function widgetarea_init() {
register_sidebar(array(
    'name'=>'サイドバー',
    'id' => 'side-widget',
    'before_widget'=>'<div id="%1$s" class="%2$s sidebar-wrapper">',
    'after_widget'=>'</div>',
    'before_title' => '<h4 class="sidebar-title">',
    'after_title' => '</h4>'
    ));
}
add_action( 'widgets_init', 'widgetarea_init' );

// パンくずリスト
function breadcrumb() {
  $home = '<li><a href="'.get_bloginfo('url').'" >TOP</a></li>';
  echo '<ul>';
  if ( is_front_page() ) {
      // トップページの場合
  }
  else if ( is_category() ) {
      // カテゴリページの場合
      $cat = get_queried_object();
      $cat_id = $cat->parent;
      $cat_list = array();
      while ($cat_id != 0){
          $cat = get_category( $cat_id );
          $cat_link = get_category_link( $cat_id );
          array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
          $cat_id = $cat->parent;
      }
      echo $home;
      foreach($cat_list as $value){
          echo $value;
      }
      the_archive_title('<li>', '</li>');
  }
  else if ( is_archive() ) {
  // 月別アーカイブ・タグページの場合
  echo $home;
  the_archive_title('<li>', '</li>');
  }
  else if ( is_single() ) {
  // 投稿ページの場合
  $cat = get_the_category();
      if( isset($cat[0]->cat_ID) ) $cat_id = $cat[0]->cat_ID;
      $cat_list = array();
      while ($cat_id != 0){
          $cat = get_category( $cat_id );
          $cat_link = get_category_link( $cat_id );
          array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
          $cat_id = $cat->parent;
      }
      foreach($cat_list as $value){
          echo $value;
      }
      the_title('<li>', '</li>');
  }
  else if( is_page() ) {
  // 固定ページの場合
  echo $home;
  the_title('<li>', '</li>');
  }
  else if( is_search() ) {
  // 検索ページの場合
  echo $home;
  echo '<li>「'.get_search_query().'」の検索結果</li>';
  }
  else if( is_404() ) {
  // 404ページの場合
  echo $home;
  echo '<li>ページが見つかりません</li>';
  }
  echo "</ul>";
}
// アーカイブの余計なタイトルを削除
add_filter( 'get_the_archive_title', function ($title) {
  if ( is_category() ) {
      $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
      $title = single_tag_title( '', false );
  } elseif ( is_month() ) {
      $title = single_month_title( '', false );
  }
  return $title;
});

//RSSにアイキャッチ画像挿入
function do_post_thumbnail_feeds($content) {
  global $post;
  if(has_post_thumbnail($post->ID)) {
    $content = '<div>' . get_the_post_thumbnail($post->ID) . '</div>' . $content;
  }
  return $content;
}
add_filter('the_excerpt_rss', 'do_post_thumbnail_feeds');
add_filter('the_content_feed', 'do_post_thumbnail_feeds');

