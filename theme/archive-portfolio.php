<?php

/**
 * Архив проектов (CPT: portfolio)
 */

get_header();
?>

<main id="main" class="portfolio-page">

  <section class="blog-hero">
    <div class="container">
      <h1>&gt; ПОРТФОЛИО</h1>
      <p>Реализованные проекты веб-студии ITLANT: сайты, интернет-магазины, SEO-продвижение.</p>
    </div>
  </section>

  <?php if (have_posts()) : ?>
    <section class="portfolio-grid container">
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/card', 'portfolio'); ?>
      <?php endwhile; ?>
    </section>

    <nav class="pagination container">
      <?php echo paginate_links(['mid_size' => 2]); ?>
    </nav>
  <?php else : ?>
    <div class="container">
      <p>Проекты пока не добавлены.</p>
    </div>
  <?php endif; ?>

</main>

<?php get_footer(); ?>