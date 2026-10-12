<?php

/**
 * Подключение CSS и JS
 */

if (!defined('ABSPATH')) exit;

add_action('wp_enqueue_scripts', function () {

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
    ITLANT_VERSION
  );

  // ---------- Кастомный CSS ----------
  wp_enqueue_style(
    'itlant-custom',
    ITLANT_URI . '/assets/css/custom.css',
    ['itlant-style'],
    ITLANT_VERSION
  );

  // ---------- CSS для раздела Услуги (только на страницах услуг) ----------
  if (is_singular('service') || is_post_type_archive('service')) {
    wp_enqueue_style(
      'itlant-service',
      ITLANT_URI . '/assets/css/service.css',
      ['itlant-style'],
      ITLANT_VERSION
    );
  }

  // ---------- CSS для форм CF7 ----------
  wp_enqueue_style(
    'itlant-form',
    ITLANT_URI . '/assets/css/form.css',
    ['itlant-style'],
    ITLANT_VERSION
  );

  // ---------- CSS для таблиц TablePress ----------
  wp_enqueue_style(
    'itlant-table',
    ITLANT_URI . '/assets/css/table.css',
    ['itlant-style'],
    ITLANT_VERSION
  );

  // ---------- Основной JS ----------
  wp_enqueue_script(
    'itlant-main',
    ITLANT_URI . '/assets/js/main.js',
    [],
    ITLANT_VERSION,
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
