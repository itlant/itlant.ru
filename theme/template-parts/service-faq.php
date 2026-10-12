<?php

/**
 * FAQ-блок из ACF
 */

$faq = get_field('faq');

if (!$faq || empty($faq['faq_item'])) return;
?>

<section class="faq service-faq">
  <h2 class="section-title">&gt; ЧАСТЫЕ ВОПРОСЫ</h2>

  <div class="faq__list">
    <?php foreach ($faq['faq_item'] as $item) :
      if (empty($item['faq_question'])) continue;
    ?>
      <details class="faq__item">
        <summary><?php echo esc_html($item['faq_question']); ?></summary>
        <p><?php echo esc_html($item['faq_answer']); ?></p>
      </details>
    <?php endforeach; ?>
  </div>
</section>