<?php
if (!defined('ABSPATH')) {
    exit;
}

use Koharu_Mods as KM;

if (has_nav_menu('primary')) {
  $nav_menu = wp_nav_menu([
      'theme_location' => 'primary',
      'container'      => false,
      'fallback_cb'    => false,
      'echo' => false,
  ]);
  $nav_menu_primary = '
    <nav class="site-nav" aria-label="Primary Navigation">
        <svg id="site-nav-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true">
          <line x1="5" y1="5" x2="19" y2="19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
          <line x1="19" y1="5" x2="5" y2="19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
      <div class="site-nav-container">
      ' . $nav_menu . '
      </div>
    </nav>
  ';
}

if ($dirh) {
    while (($dirElement = readdir($dirh)) !== false) {
        
    }
    closedir($dirh);
}
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

          <div class="site-nav-hamburger-wrapper">
            <div class="site-nav-hamburger" aria-hidden="true" aria-label="Menu">
              <span></span><span></span><span></span>
            </div>          
          </div>
          <?php
            if (is_front_page()) {
              // home page has hamburger regardless of viewport width, so for proper
              // positioning, we need this div adjacent to hamburger.
              echo $nav_menu_primary;
            }
          ?>
        </div>
      </div>
    </div>
    <?php
      if (!is_front_page()) {
        // non-home pages have hamburger only on narrow viewports, where positioning
        // is more predictable; on wide viewports, they show the full menu as a
        // bar, and it must be placed here for proper positioning.
        echo $nav_menu_primary;
      }
    ?>

  </header>