<?php

/**
 * CTA-блок из ACF
 */

$cta = get_field('cta');

$cta_title = $cta['cta_title'] ?? 'ГОТОВЫ ОБСУДИТЬ ВАШ ПРОЕКТ?';
$cta_descr = $cta['cta_descr']  ?? 'Ответим в течение 2 часов в рабочее время.';
?>

<section class="cta" id="contacts">
  <h2 class="cta__title"><?php echo esc_html($cta_title); ?></h2>
  <div class="cta__text"><?php echo wp_kses_post($cta_descr); ?></div>
  <button class="btn btn--primary" data-modal-open>Оставить заявку</button>
</section>