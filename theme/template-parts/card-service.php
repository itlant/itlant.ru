<article class="service-card">
  <h3 class="service-card__title"><?php the_title(); ?></h3>
  <?php
  $excerpt = get_the_excerpt();
  $first_sentence = preg_match('/^(.+?[.!?…])(\s|$)/u', $excerpt, $m) ? trim($m[1]) : $excerpt;
  ?>
  <p class="service-card__desc"><?php echo esc_html($first_sentence); ?></p>
  <a href="<?php the_permalink(); ?>" class="service-card__link">Подробнее →</a>
</article>