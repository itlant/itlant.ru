<article class="article-card">
  <a href="<?php the_permalink(); ?>" class="article-card__link">
    <?php if (has_post_thumbnail()) : ?>
      <div class="article-card__preview"><?php the_post_thumbnail('service-card'); ?></div>
    <?php endif; ?>
    <time class="article-card__date" datetime="<?php echo get_the_date('c'); ?>">
      <?php echo get_the_date('d.m.Y'); ?>
    </time>
    <h2 class="article-card__title"><?php the_title(); ?></h2>
    <p class="article-card__excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
  </a>
</article>