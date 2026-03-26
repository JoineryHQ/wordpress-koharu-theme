<?php

/**
 * Description of class-koahur-utils-page
 */
final class Koharu_Utils_Page {
  public static function getSectionMenu($postId) {
    $sectionMenuId = NULL;
    while (!$sectionMenuId) {
      $sectionMenuId = Koharu_Pagemeta::getPostOption($postId, 'koharu_section_menu');
      if (!$sectionMenuId) {
        $parent = get_post_parent($postId);
        if (!$parent) {
          break;
        }
        $postId = $parent->ID;
      }
    }
    
    return $sectionMenuId;
  }
}
