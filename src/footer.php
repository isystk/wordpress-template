
    <footer>
      <section class="footer1">
        <div class="menu-social-container">
          <ul class="menu">
            <li><a href="https://twitter.com/WordPress"><i class="fab fa-twitter"></i>Twitter</a></li>
            <li><a href="https://www.facebook.com/WordPress"><i class="fab fa-facebook"></i>Facebook</a></li>
            <li><a href="http://demo.themehaus.net/first/feed/"><i class="fas fa-rss"></i>RSS</a></li>
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
      <form role="search" method="get" action="#">
        <label>
          <input type="search" placeholder="検索ワードを入力" value="" name="s">
        </label>
      </form>
    </div>
    <nav>
      <!-- 
        <?php wp_nav_menu( array(
            'theme_location' => 'footer-nav',
            'container' => 'nav',
            'container_class' => 'footer-nav',
            'container_id' => 'footer-nav',
            'fallback_cb' => ''
            ) ); ?> 
            -->
      <ul>
        <li><a href="#">HOME</a></li>
        <li><a href="#">ABOUT</a></li>
        <li><a href="#">BLOG</a></li>
      </ul>
    </nav>
  </div>
  <script src="<?php bloginfo('template_directory'); ?>/js/jquery-3.4.1.min.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/underscore.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/prettify.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/lang-css.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/common.js"></script>
<?php wp_footer(); ?><!--システム・プラグイン用-->
</body>

</html>
