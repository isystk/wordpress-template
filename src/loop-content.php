<?php
 /*
    一覧に表示する投稿内容部分のパーツ
 */
?>
<article <?php post_class( 'top' ); ?>>
  <div class="entry-header">
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="entry-meta">
      <span>
        <?php 
          $post_year  = get_the_time( 'Y' );
          $post_month = get_the_time( 'm' ); 
          $post_date = get_the_time( 'j' ); 
        ?>
        <a href="<?php echo get_day_link( $post_year, $post_month, $post_date ); ?>"><time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo get_the_date(); ?></time></a>
      </span>
      <span> / </span>
      <span>
      <i class="fas fa-user"></i><?php the_author_link(); ?>
      </span>
      <?php if (!is_category() && has_category()): ?>
        <span> / </span>
        <span>
        <?php
          $category = get_the_category();
          $category_id   = $category[0]->cat_ID;
          $category_name = $category[0]->cat_name;
          $category_link = get_category_link( $category_id );
        ?>
        <a href="<?php echo $category_link ?>"><?php echo $category_name ?>
        </a></span>
      <?php endif; ?>
    </div>
    <?php if( has_post_thumbnail() ): ?>
      <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
      </div>
    <?php endif; ?>
  </div>
  <div class="entry-content">
    <a href="<?php the_permalink(); ?>"><?php the_content(); ?></a>
    <?php /* コンテンツ内容を省略表示したい場合
      <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
    */ ?>
  </div>
</article>