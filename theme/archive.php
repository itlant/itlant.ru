<?php get_header(); ?>

<main id="main">
  <section class="blog-hero">
    <div class="container">
      <h1>&gt; <?php echo esc_html(get_the_archive_title()); ?></h1>
      <?php the_archive_description('<p>', '</p>'); ?>
    </div>
  </section>

  <section class="blog-grid container">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/card', 'article'); ?>
      <?php endwhile; ?>
    <?php else : ?>
      <p>Записей пока нет.</p>
    <?php endif; ?>
  </section>

  <nav class="pagination container">
    <?php echo paginate_links(['mid_size' => 2]); ?>
  </nav>
</main>

<?php get_footer(); ?>