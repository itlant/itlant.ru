<?php

/**
 * Карточка статьи в архиве блога
 */

$categories = get_the_category();
$reading_time = max(1, round(str_word_count(strip_tags(get_the_content())) / 200));
?>

<article class="article-card">
  <a href="<?php the_permalink(); ?>" class="article-card__link">

    <?php if (has_post_thumbnail()) : ?>
      <div class="article-card__preview">
        <?php the_post_thumbnail('service-card', ['loading' => 'lazy']); ?>
      </div>
    <?php endif; ?>

    <?php if ($categories) : ?>
      <p class="article-card__category"><?php echo esc_html($categories[0]->name); ?></p>
    <?php endif; ?>

    <h2 class="article-card__title"><?php the_title(); ?></h2>

    <?php if (has_excerpt()) : ?>
      <p class="article-card__excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
    <?php endif; ?>

    <div class="article-card__meta">
      <time class="article-card__date" datetime="<?php echo get_the_date('c'); ?>">
        <?php echo get_the_date('d.m.Y'); ?>
      </time>
      <span class="article-card__dot">·</span>
      <span class="article-card__reading"><?php echo (int) $reading_time; ?> мин</span>
    </div>

  </a>
</article>