<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Helper class for page-meta settings.
 */
final class Koharu_Pagemeta {

  protected static $metaBoxes = [
    'koharu_page_options' => [
      'title' => 'Page Options',
      'callback' => 'Koharu_Pagemeta::build',
      'screen' => 'page',
      'context' => 'side',
    ],
  ];
  protected static $metaOptions = [
    // "Site Header" items
    'koharu_hide_title' => [
      'metaBoxKey' => 'koharu_page_options',
      'label' => 'Hide page title',
      'type' => 'checkbox',
    ],
    // "Site Header" items
    'koharu_section_menu' => [
      'metaBoxKey' => 'koharu_page_options',
      'label' => 'Section Menu for Display',
      'type' => 'select',
      'optionsCallback' => 'getOptionsSectionMenu',
    ],
  ];

  public static function register() {
    foreach (self::$metaBoxes as $metaboxId => $metabox) {
      add_meta_box($metaboxId, $metabox['title'], $metabox['callback'], $metabox['screen'], $metabox['context'], ($metabox['priority'] ?? 'default'), ($metabox['callback_args'] ?? NULL));
    }
  }

  public static function build($post) {
    foreach (self::$metaOptions as $metaOptionId => $metaOption) {
      $value = get_post_meta($post->ID, '_' . $metaOptionId, true);
      $metaBoxKey = $metaOption['metaBoxKey'];
      wp_nonce_field($metaBoxKey . '_nonce', $metaBoxKey . '_nonce');

      echo "<p>";
      echo "<label class=\"koharu_page_options-label-{$metaOption['type']}\">{$metaOption['label']}</label>";

      switch ($metaOption['type']) {
        case 'checkbox':
          echo "<input type=\"checkbox\" name=\"{$metaOptionId}\" value=\"1\"" . checked($value, '1', false) . ">";
          
          break;
        case 'select':
          echo "<select name=\"{$metaOptionId}\">";
          if (is_callable(['self', $metaOption['optionsCallback']])) {
            $optionsCallback = $metaOption['optionsCallback'];
            $options = self::$optionsCallback();
          }
          foreach ($options as $optionValue => $optionLabel) {
            echo "<option value=\"{$optionValue}\"" . selected($value, $optionValue, false) . ">" . esc_html($optionLabel) . "</option>";
          }            
          echo "</select>";
          break;
      }
      echo "</p>";
      
    }
  }

  public static function save($post_id) {
    if (!isset($_POST['koharu_page_options_nonce']) ||
      !wp_verify_nonce($_POST['koharu_page_options_nonce'], 'koharu_page_options_nonce')) {
      return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return;
    }
    if (!current_user_can('edit_post', $post_id)) {
      return;
    }
    foreach (self::$metaOptions as $metaOptionId => $metaOption) {
      switch ($metaOption['type']) {
        case 'checkbox':
          $value = isset($_POST[$metaOptionId]) ? '1' : '';
          break;
        case 'select':
          $value = $_POST[$metaOptionId];
          break;
        default:
          error_log("Koharu: invalid metaOption type '" . (string) $metaOption['type'] . "' when saving post $post_id.");
          return;
          break;
      }
      update_post_meta($post_id, '_' . $metaOptionId, $value);
    }
  }

  public static function getPostOption($postId, $optionName) {
    $option = (self::$metaOptions[$optionName] ?? false);
    if ($option) {
      return get_post_meta($postId, '_' . $optionName, true);
    }
    else {
      return NULL;
    }
  }

  private static function getOptionsSectionMenu() {
    $ret = [
      '' => '- (Inherit from parent, if any) -',
    ];
    $menus = wp_get_nav_menus();
    foreach ($menus as $menu) {
      $ret[$menu->term_id] = $menu->name;
    }
    return $ret;
  }
}
