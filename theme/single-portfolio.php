<?php

/**
 * Страница одного проекта (CPT: portfolio)
 */

get_header();
?>

<main id="main" class="portfolio-page">

  <?php while (have_posts()) : the_post(); ?>

    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <?php get_template_part('template-parts/portfolio', 'hero'); ?>

    <div class="container service-page__layout">

      <!-- ============ КОНТЕНТ ============ -->
      <article class="service-page__main">

        <div class="article__content">
          <?php the_content(); ?>
        </div>

        <!-- Галерея проекта (опционально, через ACF Gallery) -->
        <?php
        $gallery = get_field('portfolio_gallery');
        if ($gallery) :
        ?>
          <section class="portfolio-gallery">
            <h2 class="section-title">&gt; ГАЛЕРЕЯ</h2>
            <div class="portfolio-gallery__grid">
              <?php foreach ($gallery as $img) : ?>
                <a href="<?php echo esc_url($img['url']); ?>"
                  class="portfolio-gallery__item"
                  target="_blank" rel="noopener">
                  <img src="<?php echo esc_url($img['sizes']['medium_large']); ?>"
                    alt="<?php echo esc_attr($img['alt']); ?>"
                    loading="lazy">
                </a>
              <?php endforeach; ?>
            </div>
          </section>
        <?php endif; ?>

        <!-- CTA -->
        <section class="cta" id="contacts">
          <h2 class="cta__title">ХОТИТЕ ТАКОЙ ЖЕ ПРОЕКТ?</h2>
          <p class="cta__text">Ответим в течение 2 часов и рассчитаем стоимость.</p>
          <button class="btn btn--primary" data-modal-open>Оставить заявку</button>
        </section>

      </article>

      <!-- ============ САЙДБАР ============ -->
      <?php get_template_part('template-parts/portfolio', 'sidebar'); ?>

    </div>

  <?php endwhile; ?>

</main>

<?php get_footer(); ?>