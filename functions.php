<?php
if (!defined('ABSPATH')) {
    exit;
}

function _nmregistry_theme_setup() {
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
        'primary' => __('Primary Menu', 'nmregistry-theme'),
    ]);
}
add_action('after_setup_theme', '_nmregistry_theme_setup');

function _nmregistry_theme_enqueue_assets() {
    wp_enqueue_style(
        'nmregistry-theme-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', '_nmregistry_theme_enqueue_assets');

function nmregistry_customizer_text($wp_customize, $section, $id, $label, $default = '') {
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

function _nmregistry_customize_register($wp_customize) {

  $wp_customize->add_section('nmregistry_hero_section', [
    'title' => 'Homepage Hero',
    'priority' => 30,
  ]);


  nmregistry_customizer_text(
    $wp_customize,
    'registry_hero',
    'hero_title',
    'Hero Title',
    'Find Respite Care in New Mexico'
  );

  nmregistry_customizer_text(
    $wp_customize,
    'registry_hero',
    'hero_subtitle',
    'Hero Subtitle'
  );
  
}
add_action('customize_register', '_nmregistry_customize_register');