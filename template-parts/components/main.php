<?php
if (!defined('ABSPATH')) {
    exit;
}

use Koharu_Pagemeta as KP;

?>

<!-- start koharu_theme_get_main -->
<main class="site-main">
<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();
    ?>
    <article <?php post_class('page-layout'); ?>>
      <?php 
        if (!is_front_page()) {
          $hide_title = KP::getPostOption(get_the_ID(), 'koharu_hide_title');
          if (!$hide_title) {
            echo '<h1>' . esc_html(get_the_title()) . '</h1>';
          }
        }
      ?>
      <div>
        <?php the_content(); ?>
      </div>
    </article>
    <?php
  }
}
else {
  ?>
  <div class="page-layout">
    <p>No content found.</p>
  </div>
<?php
}
?>
</main>
<!-- end koharu_theme_get_main -->
