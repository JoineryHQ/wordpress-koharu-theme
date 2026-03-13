<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- start koharu_theme_get_main -->
<main class="site-main">
<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();

    ?>
    <article <?php post_class('page-layout'); ?>>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
