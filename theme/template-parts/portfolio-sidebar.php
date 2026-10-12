<?php

/**
 * Сайдбар страницы проекта
 */

$current_id = get_the_ID();
?>

<aside class="service-sidebar portfolio-sidebar" aria-label="Дополнительная информация">

  <!-- ============ СВЯЗАТЬСЯ ============ -->
  <div class="service-sidebar__block service-sidebar__block--contacts">
    <h3 class="service-sidebar__title">&gt; ОБСУДИТЬ ПРОЕКТ</h3>
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
    </ul>
    <button class="btn btn--primary btn--block" data-modal-open>Оставить заявку</button>
  </div>

  <!-- ============ ВСЕ ПРОЕКТЫ ============ -->
  <?php
  $all_projects = get_posts([
    'post_type'      => 'portfolio',
    'posts_per_page' => 10,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
  ]);

  if ($all_projects) :
  ?>
    <div class="service-sidebar__block">
      <h3 class="service-sidebar__title">&gt; ДРУГИЕ ПРОЕКТЫ</h3>
      <ul class="service-sidebar__list">
        <?php foreach ($all_projects as $p) : ?>
          <li class="<?php echo ($p->ID === $current_id) ? 'is-current' : ''; ?>">
            <a href="<?php echo esc_url(get_permalink($p)); ?>">
              <?php echo esc_html($p->post_title); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <!-- ============ КАТЕГОРИИ ============ -->
  <?php
  $categories = get_terms([
    'taxonomy'   => 'portfolio_category',
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

</aside>