<?php

if (!defined('ABSPATH')) {
  exit;
}

require_once get_template_directory() . '/inc/class-koharu-mods.php';
require_once get_template_directory() . '/inc/class-koharu-pagemeta.php';
require_once get_template_directory() . '/inc/class-koharu-utils-page.php';

function _koharu_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', [
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'style',
    'script',
  ]);

  register_nav_menus([
    'primary' => __('Primary Menu', 'koharu-theme'),
    'footer' => __('Footer Menu', 'koharu-theme'),
  ]);
}
add_action('after_setup_theme', '_koharu_theme_setup');

function _koharu_theme_enqueue_assets() {
  wp_enqueue_style(
    'koharu-theme-style',
    get_stylesheet_uri(),
    [],
    wp_get_theme()->get('Version')
  );
  wp_enqueue_script(
    'koharu-theme-script',
    get_stylesheet_directory_uri() . '/js/actions.js',
    ['jquery'],
    wp_get_theme()->get('Version')
  );
}
add_action('wp_enqueue_scripts', '_koharu_theme_enqueue_assets');

function koharu_tinymce_formats($init) {
  $style_formats = [
    [
      'title' => 'Action card list',
      'selector' => 'ol',
      'classes' => 'action-card-list',
    ],
    [
      'title' => 'Checkbox list',
      'selector' => 'ul',
      'classes' => 'checkbox-list',
    ],
    [
      'title' => 'CTA Button Red',
      'selector' => 'a',
      'classes' => 'button-cta-red'
    ],
    [
      'title' => 'CTA Button Cyan',
      'selector' => 'a',
      'classes' => 'button-cta-cyan'
    ],
  ];
  $init['style_formats'] = wp_json_encode($style_formats);
  $init['toolbar2'] .= ",styleselect";
  return $init;
}
add_filter('tiny_mce_before_init', 'koharu_tinymce_formats');

/**
 * Registers an editor stylesheet for the theme.
 */
function _koharu_add_editor_styles() {
    add_editor_style( 'css/editor-style.css' );
}
add_action( 'admin_init', '_koharu_add_editor_styles' );


// Add theme-level custom modifications/settings.
add_action('customize_register', 'Koharu_Mods::registerMods');


// Add page-level meta options container.
add_action('add_meta_boxes', 'Koharu_Pagemeta::register');
// Define and register callback to save page meta options.
add_action('save_post', 'Koharu_Pagemeta::save');

// queue styles for admin (so our metabox fields look nice.
function _koharu_admin_styles($hook) {
  if (!in_array($hook, ['post.php', 'post-new.php'])) {
    return;
  }

  wp_enqueue_style(
    'koharu-admin',
    get_stylesheet_directory_uri() . '/css/admin.css',
    [],
    filemtime(get_stylesheet_directory() . '/css/admin.css')
  );
}
add_action('admin_enqueue_scripts', '_koharu_admin_styles');

add_filter('the_content', function ($content) {
  if (!empty($_GET['lightbox']) && !($_GET['lightbox-nolink'] ?? false) && is_singular()) {
    // If page is viewed in a lightbox (per url query params), append a break-out link,
    // as long as we're not explicitly told to omit it (per query params)
    $title = get_the_title();
    $url   = esc_url(remove_query_arg('lightbox'));
    $content .= '<p class="lightbox-full-link"><a class="button-cta-cyan" target="_top" href="' . $url . '">View full page: ' . esc_html($title) . '</a></p>';
  }
  return $content;
});

add_filter('body_class', function($classes) {
  // If page is viewed in a lightbox (per url query params), append a class to body
  if (!empty($_GET['lightbox']) && is_singular()) {
    $classes[] = 'koharu-is-lightbox';
  }
  return $classes;
});