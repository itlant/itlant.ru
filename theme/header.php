<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <a href="#main" class="skip-link">Перейти к содержимому</a>

  <header class="header">
    <div class="container header__inner">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="logo" aria-label="ITLANT — на главную">
        <?php if (has_custom_logo()) : ?>
          <?php the_custom_logo(); ?>
        <?php else : ?>
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo-itlant.svg'); ?>"
            alt="ITLANT" width="140" height="32">
        <?php endif; ?>
      </a>

      <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'container'      => 'nav',
        'container_class' => 'nav',
        'container_aria_label' => 'Основная навигация',
        'menu_class'     => 'nav__list',
        'depth'          => 1,
        'fallback_cb'    => false,
      ]);
      ?>

      <button class="btn btn--primary" data-modal-open>Обсудить проект</button>
    </div>
  </header>