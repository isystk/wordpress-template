<?php get_header(); ?>
<div class="content">
  <main>
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <?php get_template_part('loop-content'); ?>
    <?php endwhile; endif; ?><!--ループ終了-->

    <!-- <?php echo paginate_links( array(
      'type' => 'list',
      'mid_size' => '1',
      'prev_text' => '<i class="fas fa-angle-left"></i>',
      'next_text' => '<i class="fas fa-angle-right"></i>'
      ) ); ?> -->
    <nav class="navigation pagination">
      <span class="page-numbers current">1</span>
      <span class="link"><a class="page-numbers" href="#">2</a></span>
      <span class="link"><a class="page-numbers" href="#">次へ »</a></span>
    </nav>

  </main>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
