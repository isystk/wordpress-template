<?php
 /*
    詳細ページに表示するコンテンツ
 */
?>
<?php get_header(); ?>
<div class="content">
  <main>
    <?php if(have_posts()): the_post(); ?>
      <article <?php post_class(); ?>>
        <div class="entry-header">
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
          <div class="article-img">
            <?php if( has_post_thumbnail() ): ?>
              <?php the_post_thumbnail( 'large' ); ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="entry-content">
          <?php the_content(); ?>
        </div>

        <div class="entry-tags">
          <div class="article-tag">
            <?php the_tags('<ul><li>タグ： </li><li>','</li><li>','</li></ul>'
          ); ?>
          </div>
        </div>

        <div class="clearfix"></div>
        
        <div class="entry-comments">
          <?php comments_template(); ?>
        </div>

      </article>

      <?php if( !is_home() ): ?>
        <div class="sns-buttons">
          <ul class="sns-button">
            <li><div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true"></div></li>
            <li><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a></li>
          </ul>
        </div>
      <?php endif; ?>

    <?php endif; ?>

  </main>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
