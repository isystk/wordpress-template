<?php
 /*
    共通フッターに表示するコンテンツ
 */
?>
    <footer class="footer">
      <section class="footer1">
        <div class="menu-social-container">
          <ul class="menu">
            <li><a href="https://twitter.com/ise0615"><i class="fab fa-twitter"></i>Twitter</a></li>
            <li><a href="https://www.facebook.com/ise0615"><i class="fab fa-facebook"></i>Facebook</a></li>
            <li><a href="<?php bloginfo('rss2_url'); ?>"><i class="fas fa-rss"></i>RSS</a></li>
          </ul>
        </div>
      </section>
      <section class="footer2">© 2020 <?php bloginfo( 'name' ); ?></section>
    </footer>
  </div>
  <div id="menu">
    <div>
      <a href="" class="menu-close-btn"><i class="far fa-times-circle"></i></a>
    </div>
    <div class="search">
      <?php get_search_form(); ?>
    </div>
    
    <?php #SPサイト向け遠ロワーメニュー用ナビゲーション ?>
    <nav>
      <?php wp_nav_menu( array(
              'theme_location'=>'drawer-nav', 
              'container'     =>'', 
              'menu_class'    =>'',
              'items_wrap'    =>'<ul>%3$s</ul>'));
      ?>
    </nav>

  </div>
  <?php wp_footer(); ?>
</body>
</html>
