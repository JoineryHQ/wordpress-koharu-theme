<?php
if (!defined('ABSPATH')) {
    exit;
}

use Koharu_Mods as KM;

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;family=Lora:wght@500;600&amp;display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  
  <header>
    <div class="container">
      <div class="header-row">
        <a href="/" class="brand">
          <!-- Replace with your logo path -->
            <img src="<?= KM::getMod('koharu_site_brand_image') ?>" alt="NMCC Heart Logo">
          <div class="brand-name" aria-label="Site name">
            <div class="top"><?= KM::getMod('koharu_header_title') ?></div>
            <div class="bottom"><?= KM::getMod('koharu_header_subtitle') ?></div>
          </div>
        </a>

        <div class="header-actions">
          <a class="search-link" href="<?= KM::getMod('koharu_header_search_url') ?>" aria-label="Search">
            <!-- magnifier -->
            <svg class="search-icon" viewBox="0 0 24 24" aria-hidden="true">
            <circle cx="11" cy="11" r="7" fill="none" stroke="currentColor" stroke-width="2"></circle>
            <path d="M20 20l-3.5-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
            </svg>
            <span class="icon-link-label">Search</span>
          </a>

          <?php if (has_nav_menu('primary')) : ?>
            <div class="site-nav-hamburger" aria-hidden="true" aria-label="Menu">
              <span></span><span></span><span></span>
            </div>
          <nav class="site-nav" aria-label="<?php esc_attr_e('Primary Navigation', 'koharu-theme'); ?>">
              <svg id="site-nav-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true">
                <line x1="5" y1="5" x2="19" y2="19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <line x1="19" y1="5" x2="5" y2="19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
              </svg>
            
              <?php
              wp_nav_menu([
                  'theme_location' => 'primary',
                  'container'      => false,
                  'fallback_cb'    => false,
              ]);
              ?>
          </nav>
          <?php endif; ?>
          
        </div>
      </div>
    </div>
  </header>