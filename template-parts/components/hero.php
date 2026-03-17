<?php
if (!defined('ABSPATH')) {
    exit;
}

use Koharu_Mods as KM;

?>
<section class="hero">
  <div class="hero-card">
    <div class="hero-image" role="img" aria-label="Caregiver and older adult smiling together" style="background-image: url(<?= KM::getMod('koharu_hero_image'); ?>)"></div>
    <div class="hero-copy">
      <div class="container">
        <h1 class="hero__title"><?= KM::getMod('koharu_hero_title') ?></h1>
        <?php if (KM::getMod('koharu_hero_subtitle')) : ?>
          <p class="hero__text"><?= KM::getMod('koharu_hero_subtitle'); ?></p>
        <?php endif; ?>

        <a class="button-cta-cyan shadow-cyan" href="<?= KM::getMod('koharu_hero_cta_url') ?>"><?= KM::getMod('koharu_hero_cta_text') ?></a>

        <div class="provider-link" style="display: inline;">
          <?= KM::getMod('koharu_hero_cta_secondary_html'); ?>
        </div>
      </div>
    </div>
  </div>
</section>