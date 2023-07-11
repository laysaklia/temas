<footer id="colophon" class="site-footer" role="contentinfo">
  <div class="container">
    <div class="site-info">
      <?php if (has_nav_menu('footer')) : ?>
        <?php wp_nav_menu(array('theme_location' => 'footer', 'menu_id' => 'footer-menu')); ?>
      <?php endif; ?>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>