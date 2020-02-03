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
    <nav>
      <ul>
        <li><a href="/">HOME</a></li>
        <?php wp_list_pages('title_li=');  ?>
      </ul>
    </nav>
  </div>
  <script src="<?php bloginfo('template_directory'); ?>/js/jquery-3.4.1.min.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/underscore.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/prettify.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/lang-css.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/common.js"></script>
  <?php wp_footer(); ?>
</body>
</html>
