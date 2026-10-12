<?php

/**
 * Одна статья блога
 */

get_header();
?>

<main id="main">

  <?php while (have_posts()) : the_post(); ?>

    <?php get_template_part('template-parts/breadcrumbs'); ?>

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
          <time datetime="<?php echo get_the_date('c'); ?>">
            <?php echo get_the_date('d.m.Y'); ?>
          </time>
          <span>·</span>
          <span>Автор: <?php the_author(); ?></span>
          <span>·</span>
          <span>
            <?php
            $content = strip_tags(get_the_content());
            $time = max(1, round(str_word_count($content) / 200));
            echo (int) $time . ' мин чтения';
            ?>
          </span>
        </p>
      </header>

      <div class="article__content container">
        <?php the_content(); ?>
      </div>

      <!-- Теги статьи -->
      <?php
      $tags = get_the_tags();
      if ($tags) :
      ?>
        <div class="article__tags container">
          <?php foreach ($tags as $tag) : ?>
            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="article__tag">
              #<?php echo esc_html($tag->name); ?>
            </a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <footer class="article__footer container">
        <div class="article__author">
          <strong><?php the_author(); ?></strong>
          <p><?php echo esc_html(get_the_author_meta('description')); ?></p>
        </div>
      </footer>

    </article>

    <!-- ============ ПОХОЖИЕ СТАТЬИ ============ -->
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

    <!-- ============ CTA ============ -->
    <section class="cta" id="contacts">
      <div class="container">
        <h2 class="cta__title">НУЖНА ПОМОЩЬ С ПРОЕКТОМ?</h2>
        <p class="cta__text">Проведём бесплатную консультацию по вашему сайту.</p>
        <button class="btn btn--primary" data-modal-open>Оставить заявку</button>
      </div>
    </section>

  <?php endwhile; ?>

</main>

<?php get_footer(); ?>