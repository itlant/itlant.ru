<?php

/**
 * Сайдбар страницы услуги
 */

$current_id = get_the_ID();
?>

<aside class="service-sidebar" aria-label="Дополнительная информация">

  <!-- ============ КОНТАКТЫ (на мобильных — сверху) ============ -->
  <div class="service-sidebar__block service-sidebar__block--contacts">
    <h3 class="service-sidebar__title">&gt; СВЯЗАТЬСЯ</h3>

    <ul class="service-contacts">
      <li>
        <a href="mailto:<?php echo esc_attr(itlant_get_email()); ?>" class="service-contacts__link">
          <span class="service-contacts__icon" aria-hidden="true">✉</span>
          <span><?php echo esc_html(itlant_get_email()); ?></span>
        </a>
      </li>
      <li>
        <a href="https://t.me/itlant" target="_blank" rel="noopener" class="service-contacts__link">
          <span class="service-contacts__icon" aria-hidden="true">✈</span>
          <span>Telegram</span>
        </a>
      </li>
      <li>
        <a href="https://wa.me/79000000000" target="_blank" rel="noopener" class="service-contacts__link">
          <span class="service-contacts__icon" aria-hidden="true">✆</span>
          <span>WhatsApp</span>
        </a>
      </li>
    </ul>

    <button class="btn btn--primary btn--block" data-modal-open>Обсудить проект</button>
  </div>

  <!-- ============ СПИСОК УСЛУГ ============ -->
  <?php
  $all_services = get_posts([
    'post_type'      => 'service',
    'posts_per_page' => 20,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
  ]);

  if ($all_services) :
  ?>
    <div class="service-sidebar__block">
      <h3 class="service-sidebar__title">&gt; ВСЕ УСЛУГИ</h3>
      <ul class="service-sidebar__list">
        <?php foreach ($all_services as $s) : ?>
          <li class="<?php echo ($s->ID === $current_id) ? 'is-current' : ''; ?>">
            <a href="<?php echo esc_url(get_permalink($s)); ?>">
              <?php echo esc_html($s->post_title); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <!-- ============ КАТЕГОРИИ УСЛУГ ============ -->
  <?php
  $categories = get_terms([
    'taxonomy'   => 'service_category',
    'hide_empty' => true,
  ]);

  if ($categories && !is_wp_error($categories)) :
  ?>
    <div class="service-sidebar__block">
      <h3 class="service-sidebar__title">&gt; КАТЕГОРИИ</h3>
      <ul class="service-sidebar__list">
        <?php foreach ($categories as $cat) : ?>
          <li>
            <a href="<?php echo esc_url(get_term_link($cat)); ?>">
              <?php echo esc_html($cat->name); ?>
              <span class="service-sidebar__count">(<?php echo (int) $cat->count; ?>)</span>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <!-- ============ МИНИ-ФОРМА ============ -->
  <!-- <div class="service-sidebar__block service-sidebar__block--form">
    <h3 class="service-sidebar__title">&gt; БЫСТРАЯ ЗАЯВКА</h3>
    <?php echo do_shortcode('[contact-form-7 id="53ce009" title="Быстрая заявка"]'); ?>
  </div> -->

</aside>