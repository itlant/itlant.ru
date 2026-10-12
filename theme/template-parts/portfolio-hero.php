<?php

/**
 * Hero-секция страницы проекта
 */

$portfolio_id  = get_the_ID();
$client        = get_field('portfolio_client');
$services      = get_field('portfolio_services');
$year          = get_the_date('Y');
$url           = get_field('portfolio_url');
$categories    = get_the_terms($portfolio_id, 'portfolio_category');
?>

<section class="portfolio-hero">
  <div class="container">

    <?php if ($categories && !is_wp_error($categories)) : ?>
      <p class="portfolio-hero__category">
        <?php foreach ($categories as $i => $cat) : ?>
          <?php echo esc_html($cat->name); ?><?php echo ($i < count($categories) - 1) ? ', ' : ''; ?>
        <?php endforeach; ?>
      </p>
    <?php endif; ?>

    <h1 class="portfolio-hero__title"><?php the_title(); ?></h1>

    <?php if (has_excerpt()) : ?>
      <p class="portfolio-hero__lead"><?php echo esc_html(get_the_excerpt()); ?></p>
    <?php endif; ?>

    <dl class="portfolio-hero__meta">
      <?php if ($client) : ?>
        <div class="portfolio-hero__meta-item">
          <dt>Клиент</dt>
          <dd><?php echo esc_html($client); ?></dd>
        </div>
      <?php endif; ?>

      <?php if ($services) : ?>
        <div class="portfolio-hero__meta-item">
          <dt>Услуги</dt>
          <dd><?php echo esc_html($services); ?></dd>
        </div>
      <?php endif; ?>

      <div class="portfolio-hero__meta-item">
        <dt>Год</dt>
        <dd><?php echo esc_html($year); ?></dd>
      </div>

      <?php if ($url) : ?>
        <div class="portfolio-hero__meta-item">
          <dt>Сайт</dt>
          <dd><a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener">Открыть →</a></dd>
        </div>
      <?php endif; ?>
    </dl>

  </div>
</section>