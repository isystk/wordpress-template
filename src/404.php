<!-- 404.php -->
<?php get_header(); ?>
<div class="content">
  <main>
    <h2>404 Not Found（ページが見つかりませんでした）</h2>
    <p>指定された以下のページは存在しないか、または移動した可能性があります。</p>
    <p class="error_url">URL ：<span><?php echo get_pagenum_link(); ?></span></p>
    <p>現在表示する記事がありません。よろしければ、検索ボックスにお探しのコンテンツに該当するキーワードを入力して下さい。</p>
    <div class="search mb-10">
      <?php get_search_form(); ?>
    </div>
    <p><a href="<?php echo home_url(); ?>" class="underline">トップページへ</a></p>
  </main>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
