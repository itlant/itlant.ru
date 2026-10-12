<?php get_header(); ?>

<main id="main" class="container">
  <?php if (have_posts()) : ?>
    <h1 class="section-title">&gt; <?php single_post_title(); ?></h1>
    <div class="blog-grid">
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/card', 'article'); ?>
      <?php endwhile; ?>
    </div>
    <?php the_posts_pagination(['mid_size' => 2]); ?>
  <?php else : ?>
    <p>Записей пока нет.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>