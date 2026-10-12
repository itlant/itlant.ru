<?php

/**
 * Подключение CSS и JS
 */

if (!defined('ABSPATH')) exit;

add_action('wp_enqueue_scripts', function () {

  // Хелпер версии: filemtime, если файл есть, иначе — версия темы
  $ver = function ($rel) {
    $full = ITLANT_DIR . $rel;
    return file_exists($full) ? filemtime($full) : ITLANT_VERSION;
  };

  // ---------- Локальные шрифты ----------
  wp_enqueue_style(
    'itlant-fonts',
    ITLANT_URI . '/assets/css/fonts.min.css',
    [],
    ITLANT_VERSION
  );

  // ---------- Основной CSS ----------
  wp_enqueue_style(
    'itlant-style',
    ITLANT_URI . '/assets/css/style.min.css',
    ['itlant-fonts'],
    $ver('/assets/css/style.min.css')
  );

  // ---------- Кастомный CSS (живёт только в теме) ----------
  wp_enqueue_style(
    'itlant-custom',
    ITLANT_URI . '/assets/css/custom.css',
    ['itlant-style'],
    ITLANT_VERSION
  );

  // ---------- Услуги ----------
  if (is_singular('service') || is_post_type_archive('service')) {
    wp_enqueue_style(
      'itlant-service',
      ITLANT_URI . '/assets/css/service.min.css',
      ['itlant-style'],
      $ver('/assets/css/service.min.css')
    );
  }

  // ---------- Портфолио ----------
  if (is_singular('portfolio') || is_post_type_archive('portfolio') || is_tax('portfolio_category')) {
    wp_enqueue_style(
      'itlant-portfolio',
      ITLANT_URI . '/assets/css/portfolio.min.css',
      ['itlant-style'],
      $ver('/assets/css/portfolio.min.css')
    );
  }

  // ---------- Блог (стандартные посты) ----------
  if (is_singular('post') || is_home() || is_category() || is_tag()) {
    wp_enqueue_style(
      'itlant-blog',
      ITLANT_URI . '/assets/css/blog.min.css',
      ['itlant-style'],
      $ver('/assets/css/blog.min.css')
    );
  }

  // ---------- Формы ----------
  wp_enqueue_style(
    'itlant-form',
    ITLANT_URI . '/assets/css/form.min.css',
    ['itlant-style'],
    $ver('/assets/css/form.min.css')
  );

  // ---------- Таблицы ----------
  wp_enqueue_style(
    'itlant-table',
    ITLANT_URI . '/assets/css/table.min.css',
    ['itlant-style'],
    $ver('/assets/css/table.min.css')
  );

  // ---------- Основной JS ----------
  wp_enqueue_script(
    'itlant-main',
    ITLANT_URI . '/assets/js/main.min.js',
    [],
    $ver('/assets/js/main.min.js'),
    true
  );

  // ---------- Данные для JS ----------
  wp_localize_script('itlant-main', 'ITLANT_DATA', [
    'ajaxUrl' => admin_url('admin-ajax.php'),
    'homeUrl' => home_url('/'),
    'nonce'   => wp_create_nonce('itlant_nonce'),
  ]);
});

// ---------- Preload критичных шрифтов ----------
add_action('wp_head', function () {
  $uri = ITLANT_URI;
?>
  <link rel="preload" href="<?php echo esc_url($uri . '/assets/fonts/IBMPlexMono-Regular.woff2'); ?>" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?php echo esc_url($uri . '/assets/fonts/IBMPlexMono-Bold.woff2'); ?>" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?php echo esc_url($uri . '/assets/fonts/PressStart2P-Regular.woff2'); ?>" as="font" type="font/woff2" crossorigin>
<?php
}, 1);