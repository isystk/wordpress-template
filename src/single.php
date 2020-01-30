<!--詳細画面に表示するコンテンツ-->
<?php get_header(); ?>
<div class="content">
  <main>
    <?php if(have_posts()): the_post(); ?>
    <article <?php post_class( 'detail' ); ?>>
      <div class="entry-header">
        <!--タイトル-->
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="entry-meta">
          <i class="far fa-clock"></i>
          <time
          datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
          <?php echo get_the_date(); ?>
          </time>
          <span> / </span>
          <span class="article-author">
            <i class="fas fa-user"></i><?php the_author(); ?>
          </span>
          <!--カテゴリ取得-->
          <?php if(has_category() ): ?>
          <span> / </span>
          <span class="cat-data">
            <?php echo get_the_category_list( ' ' ); ?>
          </span>
          <?php endif; ?>
          <span> / </span>
          <span class="post_comments_link">
            コメント数<?php comments_number('(0)','(1)','(%)'); ?>
          </span>
        </div>
        <!--アイキャッチ取得-->
        <div class="article-img">
          <?php if( has_post_thumbnail() ): ?>
            <?php the_post_thumbnail( 'large' ); ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="entry-content">
        <!--本文取得-->
        <?php the_content(); ?>

      </div>

      <div class="entry-tags">
        <!--タグ-->
        <div class="article-tag">
          <?php the_tags('<ul><li>タグ： </li><li>','</li><li>','</li></ul>'
        ); ?>
        </div>
      </div>
      
      <div class="entry-comments">
        <!--コメント-->
        <?php comments_template(); ?>
      </div>

    </article>
    <?php endif; ?>

  </main><!--end contents-->
  <?php get_sidebar(); ?>
</div><!--end container-->
<?php get_footer(); ?>
