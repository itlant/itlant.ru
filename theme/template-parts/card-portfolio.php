<?php

/**
 * Карточка проекта в архиве
 */

$portfolio_id = get_the_ID();
$categories   = get_the_terms($portfolio_id, 'portfolio_category');
$year         = get_the_date('Y');
?>

<article class="portfolio-card">
  <a href="<?php the_permalink(); ?>" class="portfolio-card__link">
    <div class="portfolio-card__preview">
      <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('portfolio-card', ['loading' => 'lazy']); ?>
      <?php else : ?>
        <div class="portfolio-card__placeholder" aria-hidden="true"></div>
      <?php endif; ?>
    </div>

    <div class="portfolio-card__body">
      <?php if ($categories && !is_wp_error($categories)) : ?>
        <div class="portfolio-card__tags">
          <?php foreach ($categories as $cat) : ?>
            <span class="portfolio-card__tag"><?php echo esc_html($cat->name); ?></span>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <h3 class="portfolio-card__title"><?php the_title(); ?></h3>

      <?php if (has_excerpt()) : ?>
        <p class="portfolio-card__excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
      <?php endif; ?>

      <div class="portfolio-card__meta">
        <time class="portfolio-card__year" datetime="<?php echo get_the_date('c'); ?>">
          <?php echo esc_html($year); ?>
        </time>
        <span class="portfolio-card__arrow" aria-hidden="true">→</span>
      </div>
    </div>
  </a>
</article>