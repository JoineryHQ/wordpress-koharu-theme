<?php
if (!defined('ABSPATH')) {
  exit;
}

use Koharu_Mods as KM;

?>

<footer>
  <div class="container">
    <div class="footer-row">
      <div class="footer-left">
        <img src="<?= KM::getMod('koharu_site_brand_image') ?>" alt="" aria-hidden="true">
        <span><?= KM::getMod('koharu_footer_about_html') ?></span>
        
      </div>
      <div class="footer-right">
          <?php if (has_nav_menu('footer')) : ?>
            <nav class="footer-links" aria-label="<?php esc_attr_e('Footer Navigation', 'koharu-theme'); ?>">
                  <?php
                  wp_nav_menu([
                      'theme_location' => 'footer',
                      'container'      => false,
                      'fallback_cb'    => false,
                  ]);
                  ?>
    <!--          <a href="#">Terms of Use</a>
              <a href="#" class="footer-link-cta">Become a Provider</a>-->
            </nav>
        <?php endif; ?>
        <div class="copyright">
          &copy; <?= esc_html(wp_date('Y')); ?> <?= KM::getMod('koharu_footer_copyright_text'); ?>
        </div>
      </div>
    </div>

  </div>
</footer>



<!--
<footer class="site-footer">
  <div class="site-footer__inner">
    <p>.</p>
  </div>
</footer>
-->
<?php wp_footer(); ?>
</body>
</html>
