<?php

/**
 * Hero-секция страницы услуги
 */

$service_id = get_the_ID();
?>

<section class="service-hero">
  <div class="container">
    <h1 class="service-hero__title"><?php the_title(); ?></h1>

    <?php if (has_excerpt()) : ?>
      <p class="service-hero__lead"><?php echo esc_html(get_the_excerpt()); ?></p>
    <?php endif; ?>

    <!-- <div class="service-hero__actions">
      <button class="btn btn--primary" data-modal-open>Заказать услугу</button>
      <a href="#contacts" class="btn btn--ghost">Получить консультацию</a>
    </div> -->
  </div>
</section>