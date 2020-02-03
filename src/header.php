<?php
 /*
    共通ヘッダーに表示するコンテンツ
 */
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php
if( is_single() && !is_home() || is_page() && !is_front_page()) {
  //タイトル
  $title = get_the_title();
  //ディスクリプション
  if(!empty($post->post_excerpt)) {
    $description = str_replace(array("\r\n", "\r", "\n", "&nbsp;"), '', strip_tags($post->post_excerpt));
  } elseif(!empty($post->post_content)) {
    $description = str_replace(array("\r\n", "\r", "\n", "&nbsp;"), '', strip_tags($post->post_content));
    $description_count = mb_strlen($description, 'utf8');
    if($description_count > 120) {
      $description = mb_substr($description, 0, 120, 'utf8').'…';
    }
  } else {
    $description = '';
  }
  //キーワード
  if (has_tag()) {
    $tags = get_the_tags();
    $kwds = array();
    $i = 0;
    foreach($tags as $tag){
      $kwds[] = $tag->name;
      if($i === 4) {
        break;
      }
      $i++;
    }
    $keywords = implode(',',$kwds);
  }  else {
    $keywords = '';
  }
  //ページタイプ
  $page_type = 'article';
  //ページURL
  $page_url = get_the_permalink();
  //OGP用画像
  if(!empty(get_post_thumbnail_id())) {
    $ogp_img_data = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
    $ogp_img = $ogp_img_data[0];
  }
} else { //ループのページ(home・カテゴリー・タグなど)
  //先に投稿・固定ページ以外の詳細な条件分岐
  if(is_category()) {
    $title = single_cat_title("", false).'の記事一覧';
    if(!empty(category_description())) {
      $description = strip_tags(category_description());
    } else {
      $description = 'カテゴリー『'.single_cat_title("", false).'』の記事一覧ページです。';
    }
  } elseif(is_tag()) {
    $title = single_cat_title("", false).'の記事一覧';
    if(!empty(tag_description())) {
      $description = strip_tags(tag_description());
    } else {
      $description = 'タグ『'.single_cat_title("", false).'』の記事一覧ページです。';
    }
  } elseif(is_year()) {
    $title = get_the_time("Y年").'の記事一覧';
    $description = '『'.get_the_time("Y年").'』に投稿された記事の一覧ページです。';//指定したい場合は個別に入力
  } elseif(is_month()) {
    $title = get_the_time("Y年m月").'の記事一覧';
    $description = '『'.get_the_time("Y年m月").'』に投稿された記事の一覧ページです。';//指定したい場合は個別に入力
  } elseif(is_day()) {
    $title = get_the_time("Y年m月d日").'の記事一覧';
    $description = '『'.get_the_time("Y年m月d日").'』に投稿された記事の一覧ページです。';//指定したい場合は個別に入力
  } elseif(is_author()) {
    $author_id = get_query_var('author');
    $author_name = get_the_author_meta( 'display_name', $author_id );
    $title = $author_name.'が投稿した記事一覧';
    $description = '『'.$author_name.'』が書いた記事の一覧ページです。';
  } else {
    $title = '';
    $description = get_bloginfo( 'description' );
  }

  //キーワード
  $allcats = get_categories();
  if(!empty($allcats)) {
    $kwds = array();
    $i = 0;
    foreach($allcats as $allcat) {
      $kwds[] = $allcat->name;
      if($i === 4) {
        break;
      }
      $i++;
    }
    $keywords = implode( ',',$kwds );
  } else {
    $keywords = '';
  }

  //ページタイプ
  $page_type = 'website';

  //ページURL
  $http = is_ssl() ? 'https'.'://' : 'http'.'://';
  $page_url = $http.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
}

//OGP用画像
if(empty($ogp_img)) {
  $ogp_img = get_template_directory_uri().'/images/ogp_img.jpg';//サイト全てに共通の画像へのパス
}

//タイトル
if(!empty($title)) {
  $output_title = $title.' | '.get_bloginfo('name');
} else {
  $title = get_bloginfo('name');
  $output_title = get_bloginfo('name');
}
?>

<title><?php echo $output_title; ?></title>
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta property="og:type" content="<?php echo $page_type; ?>">
<meta property="og:locale" content="ja_JP">
<meta property="og:title" content="<?php echo $title; ?>">
<meta property="og:url" content="<?php echo $page_url; ?>">
<meta property="og:description" content="<?php echo $description; ?>">
<meta property="og:image" content="<?php echo $ogp_img; ?>">
<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">

<?php if(is_tag() || is_date() || is_search() || is_404()) : ?>
<meta name="robots" content="noindex">
<?php endif; ?>

<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>"><!--スタイルシートの呼び出し-->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/normalize.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/prettify.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/common.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
<link rel="icon" type="image/png" size="256x256" href="<?php echo get_template_directory_uri(); ?>/images/android-chrome.png">
<link rel="alternate" type="application/rss+xml" title="フィード" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="コメントフィード" href="<?php bloginfo('comments_rss2_url'); ?>" />

<?php wp_head(); ?>
</head>
<body <?php body_class('column2 side-right'); ?>>
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v5.0"></script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  <div class="wrap">
    <header class="header">
      <div class="logo"><?php echo $title; ?></div>
      <div id="menu-btn">
        <a href="#"><i class="fas fa-bars"></i></a>
      </div>
      <div class="search">
        <?php get_search_form(); ?>
      </div>
    </header>

    <?php if( is_home() ): ?>
      <div class="header-image"></div>
    <?php endif; ?>

    <div id="pc-menu">
      <nav>
        <ul>
          <li><a href="/">HOME</a></li>
          <?php wp_list_pages('title_li=');  ?>
        </ul>
      </nav>
    </div>

    <nav class="breadcrumb">
      <?php breadcrumb(); ?>
    </nav>