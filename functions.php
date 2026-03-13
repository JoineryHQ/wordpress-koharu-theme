<?php
if (!defined('ABSPATH')) {
    exit;
}

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
}
add_action('wp_enqueue_scripts', '_koharu_theme_enqueue_assets');

function koharu_customizer_text($wp_customize, $section, $id, $label, $default = '') {
  $wp_customize->add_setting($id, [
    'default' => $default,
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control($id, [
    'label' => $label,
    'section' => $section,
    'type' => 'text',
  ]);
}

function _koharu_customize_register($wp_customize) {

  $wp_customize->add_section('koharu_hero_section', [
    'title' => 'Homepage Hero',
    'priority' => 30,
  ]);


  koharu_customizer_text(
    $wp_customize,
    'registry_hero',
    'hero_title',
    'Hero Title',
    'Find Respite Care in New Mexico'
  );

  koharu_customizer_text(
    $wp_customize,
    'registry_hero',
    'hero_subtitle',
    'Hero Subtitle'
  );
  
}
add_action('customize_register', '_koharu_customize_register');