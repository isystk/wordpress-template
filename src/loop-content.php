<article <?php post_class( 'post' ); ?>>
  <header class="entry-header">
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="entry-meta">
      <span>
        <a href="#"><time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo get_the_date(); ?></time></a>
      </span>
      <span> / </span>
      <span>
        <a href="#"><i class="fas fa-user"></i><?php the_author(); ?></a>
      </span>
    </div>
    <!--画像を追加-->
    <?php if( has_post_thumbnail() ): ?>
      <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
      </div>
    <?php endif; ?>
    <!--カテゴリ-->
    <?php if (!is_category() && has_category()): ?>
      <span class="cat-data">
      <?php
        $postcat = get_the_category();
        echo $postcat[0]->name;
      ?>
      </span>
    <?php endif; ?>
  </header>
  <div class="entry-content">
    <?php the_excerpt(); ?>
  </div>
</article>