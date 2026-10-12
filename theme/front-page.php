<?php get_header(); ?>

<main id="main">

  <!-- HERO -->
  <section class="hero">
    <div class="container">
      <h1 class="hero__title"><?php echo wp_kses_post(get_theme_mod('hero_title', 'СОЗДАЁМ САЙТЫ,<br>КОТОРЫЕ РАБОТАЮТ')); ?></h1>
      <p class="hero__subtitle"><?php echo esc_html(get_theme_mod('hero_subtitle', 'Веб-студия ITLANT: разработка, SEO-продвижение и реклама.')); ?></p>
      <div class="hero__actions">
        <button class="btn btn--primary" data-modal-open>Обсудить проект</button>
        <a href="#services" class="btn btn--ghost">Наши услуги</a>
      </div>
    </div>
  </section>

  <!-- УСЛУГИ -->
  <section id="services" class="services">
    <div class="container">
      <h2 class="section-title">&gt; НАШИ УСЛУГИ</h2>
      <div class="services__grid">
        <?php
        $services = new WP_Query([
          'post_type'      => 'service',
          'posts_per_page' => 6,
          'orderby'        => 'menu_order',
          'order'          => 'ASC',
        ]);
        if ($services->have_posts()) :
          while ($services->have_posts()) : $services->the_post();
            get_template_part('template-parts/card', 'service');
          endwhile;
          wp_reset_postdata();
        else :
        ?>
          <p>Услуги пока не добавлены.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- ПОРТФОЛИО -->
  <section id="portfolio" class="portfolio">
    <div class="container">
      <h2 class="section-title">&gt; ПОРТФОЛИО</h2>
      <div class="portfolio__grid">
        <?php
        $portfolio = new WP_Query([
          'post_type'      => 'portfolio',
          'posts_per_page' => 6,
        ]);
        if ($portfolio->have_posts()) :
          while ($portfolio->have_posts()) : $portfolio->the_post();
        ?>
            <a href="<?php the_permalink(); ?>" class="portfolio__item">
              <div class="portfolio__preview" aria-hidden="true">
                <?php if (has_post_thumbnail()) the_post_thumbnail('service-card'); ?>
              </div>
              <h3 class="portfolio__title"><?php the_title(); ?></h3>
              <p class="portfolio__meta"><?php echo esc_html(get_the_excerpt()); ?></p>
            </a>
        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section id="contacts" class="cta">
    <div class="container">
      <h2 class="cta__title">ГОТОВЫ ОБСУДИТЬ ВАШ ПРОЕКТ?</h2>
      <p class="cta__text">Ответим в течение 2 часов в рабочее время.</p>
      <button class="btn btn--primary" data-modal-open>Оставить заявку</button>
    </div>
  </section>

</main>

<?php get_footer(); ?>