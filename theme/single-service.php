<?php

/**
 * Шаблон страницы услуги (CPT: service)
 */

get_header();
?>

<main id="main" class="service-page">

  <?php while (have_posts()) : the_post(); ?>

    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <?php get_template_part('template-parts/service', 'hero'); ?>

    <div class="container service-page__layout">

      <!-- ============ ОСНОВНОЙ КОНТЕНТ ============ -->
      <article class="service-page__main">

        <!-- Контент из редактора -->
        <div class="article__content">
          <?php the_content(); ?>
        </div>

        <!-- FAQ из ACF -->
        <?php get_template_part('template-parts/service', 'faq'); ?>

        <!-- CTA из ACF -->
        <?php get_template_part('template-parts/service', 'cta'); ?>

      </article>

      <!-- ============ САЙДБАР ============ -->
      <?php get_template_part('template-parts/service', 'sidebar'); ?>

    </div>

  <?php endwhile; ?>

</main>

<?php get_footer(); ?>