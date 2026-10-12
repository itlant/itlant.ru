<?php get_header(); ?>

<main id="main">
  <?php while (have_posts()) : the_post(); ?>
    <article class="article">
      <header class="article__header container">
        <h1 class="article__title"><?php the_title(); ?></h1>
      </header>
      <div class="article__content container">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>