<?php get_header(); ?>

<main id="main">
  <?php while (have_posts()) : the_post(); ?>
    <article class="article">
      <header class="article__header container">
        <?php
        $cats = get_the_category();
        if ($cats) :
        ?>
          <p class="article__category"><?php echo esc_html($cats[0]->name); ?></p>
        <?php endif; ?>

        <h1 class="article__title"><?php the_title(); ?></h1>

        <p class="article__meta">
          <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('d.m.Y'); ?></time>
          <span>·</span>
          <span>Автор: <?php the_author(); ?></span>
        </p>
      </header>

      <div class="article__content container">
        <?php the_content(); ?>
      </div>

      <footer class="article__footer container">
        <div class="article__author">
          <strong><?php the_author(); ?></strong>
          <p><?php echo esc_html(get_the_author_meta('description')); ?></p>
        </div>
      </footer>
    </article>

    <!-- Похожие статьи -->
    <?php
    $related = new WP_Query([
      'post_type'      => 'post',
      'posts_per_page' => 3,
      'post__not_in'   => [get_the_ID()],
      'category__in'   => wp_get_post_categories(get_the_ID()),
      'orderby'        => 'rand',
    ]);
    if ($related->have_posts()) :
    ?>
      <section class="related container">
        <h2>&gt; ПОХОЖИЕ СТАТЬИ</h2>
        <div class="blog-grid">
          <?php while ($related->have_posts()) : $related->the_post(); ?>
            <?php get_template_part('template-parts/card', 'article'); ?>
          <?php endwhile;
          wp_reset_postdata(); ?>
        </div>
      </section>
    <?php endif; ?>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>