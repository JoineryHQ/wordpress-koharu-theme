<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<section class="hero">
    <h1 class="hero__title"><?php bloginfo('name'); ?></h1>
    <?php if (get_bloginfo('description')) : ?>
        <p class="hero__text"><?php bloginfo('description'); ?></p>
    <?php endif; ?>
</section>
