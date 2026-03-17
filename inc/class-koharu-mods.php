<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Helper class for theme settings.
 */
final class Koharu_Mods {

  protected static $sections = [
    'koharu_header_section' => [
      'title' => 'Site Header',
      'priority' => 20,
    ],
    'koharu_hero_section' => [
      'title' => 'Homepage Hero',
      'priority' => 30,
    ],
    'koharu_footer_section' => [
      'title' => 'Site Footer',
      'priority' => 40,
    ],
  ];
  protected static $mods = [
    // "Site Header" items
    'koharu_header_title' => [
      'setting' => [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
      ],
      'control' => [
        'section' => 'koharu_header_section',
        'label' => 'Header Title',
        'type' => 'text',
        'priority' => 10,
      ],
      'escape_callback' => 'esc_html',
    ],
    'koharu_header_subtitle' => [
      'setting' => [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
      ],
      'control' => [
        'section' => 'koharu_header_section',
        'label' => 'Header Subtitle',
        'type' => 'text',
        'priority' => 20,
      ],
      'escape_callback' => 'esc_html',      
    ],
    'koharu_header_search_url' => [
      'setting' => [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
      ],
      'control' => [
        'section' => 'koharu_header_section',
        'label' => 'Search URL',
        'type' => 'text',
        'priority' => 30,
      ],
      'escape_callback' => 'esc_url',
    ],
    
    // "Homepage Hero" items
    'koharu_hero_title' => [
      'setting' => [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
      ],
      'control' => [
        'section' => 'koharu_hero_section',
        'label' => 'Hero Title',
        'type' => 'text',
        'priority' => 10,
      ],
      'escape_callback' => 'esc_html',
    ],
    'koharu_hero_subtitle' => [
      'setting' => [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
      ],
      'control' => [
        'section' => 'koharu_hero_section',
        'label' => 'Hero Subitle',
        'type' => 'text',
        'priority' => 20,
      ],
      'escape_callback' => 'esc_html',
    ],
    'koharu_hero_cta_text' => [
      'setting' => [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
      ],
      'control' => [
        'section' => 'koharu_hero_section',
        'label' => 'Hero Button Text',
        'type' => 'text',
        'priority' => 30,
      ],
      'escape_callback' => 'esc_html',
    ],
    'koharu_hero_cta_url' => [
      'setting' => [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
      ],
      'control' => [
        'section' => 'koharu_hero_section',
        'label' => 'Hero Button URL',
        'type' => 'text',
        'priority' => 40,
      ],
      'escape_callback' => 'esc_url',
    ],
    'koharu_hero_cta_secondary_html' => [
      'setting' => [
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
      ],
      'control' => [
        'section' => 'koharu_hero_section',
        'label' => 'Hero Secondary CTA HTML',
        'type' => 'text',
        'priority' => 50,
      ],
      'escape_callback' => 'wp_kses_post',
    ],
    'koharu_hero_image' => [
      'setting' => [
        'sanitize_callback' => 'esc_url_raw',        
      ],
      'control' => [
        'section' => 'koharu_hero_section',
        'settings' => 'koharu_hero_image',
        'label' => 'Hero Image',
        'type' => 'image',
        'priority' => 50,
      ],
      'escape_callback' => 'esc_url',
    ],

    // "Site Footer" items
    'koharu_footer_copyright_text' => [
      'setting' => [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
      ],
      'control' => [
        'section' => 'koharu_footer_section',
        'label' => 'Copyright Name',
        'type' => 'text',
        'priority' => 30,
      ],
      'escape_callback' => 'esc_html',
    ],    
    'koharu_footer_about_html' => [
      'setting' => [
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
      ],
      'control' => [
        'section' => 'koharu_footer_section',
        'label' => 'Footer "about" HTML',
        'type' => 'textarea',
        'priority' => 50,
      ],
      'escape_callback' => 'wp_kses_post',
    ],

    // "Site Identity" items
    'koharu_site_brand_image' => [
      'setting' => [
        'sanitize_callback' => 'esc_url_raw',        
      ],
      'control' => [
        'section' => 'title_tagline',
        'settings' => 'koharu_site_brand_image',
        'label' => 'Brand Image',
        'type' => 'image',
        'description' => 'An image (logo) to display in the site header and footer. Should be a square (height equal to width). Minimum height: 46px.',
        'priority' => 50,
      ],
      'escape_callback' => 'esc_url',
    ],
  ];

  public static function singleton() {
    static $instance;

    if (!isset($instance)) {
      $instance = new Koharu_Settings();
    }
    return $instance;
  }

  public static function getMod($modName) {
    $mod = (self::$mods[$modName] ?? NULL);
    if ($mod) {
      $callback = $mod['escape_callback'] ?? NULL;
    }
    if ($callback) {
      $modValue = get_theme_mod($modName);
      return $callback($modValue);
    }
    return '';
  }

  public static function registerMods($wp_customize) {
    foreach (self::$sections as $sectionKey => $section) {
      $wp_customize->add_section($sectionKey, $section);      
    }
    foreach (self::$mods as $modKey => $mod) {
      $wp_customize->add_setting($modKey, $mod['setting']);

      switch ($mod['control']['type']) {
        case 'image':
          unset($mod['control']['type']);
          $wp_customize->add_control(
            new WP_Customize_Image_Control(
              $wp_customize,
              $modKey,
              $mod['control']
            )
          );
          break;
        default:
          $wp_customize->add_control($modKey, $mod['control']);
          break;
      }
    }
  }
}
