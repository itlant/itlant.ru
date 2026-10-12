<?php

/**
 * Чистка WordPress от лишнего
 */

if (!defined('ABSPATH')) exit;

add_action('init', function () {

  // ---------- Убираем из <head> ----------
  remove_action('wp_head', 'wp_generator');           // версия WordPress
  remove_action('wp_head', 'rsd_link');                // RSD
  remove_action('wp_head', 'wlwmanifest_link');        // Windows Live Writer
  remove_action('wp_head', 'wp_shortlink_wp_head');    // короткие ссылки
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10); // соседние посты

  // ---------- Эмодзи ----------
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('admin_print_styles', 'print_emoji_styles');

  // ---------- oEmbed ----------
  remove_action('wp_head', 'wp_oembed_add_discovery_links');
  remove_action('wp_head', 'wp_oembed_add_host_js');

  // ---------- REST API для неавторизованных ----------
  // Раскомментируй, если не используешь REST API публично:
  // remove_action('rest_api_init', 'wp_oembed_register_route');
  // add_filter('rest_authentication_errors', function ($result) {
  //     if (!empty($result)) return $result;
  //     if (!is_user_logged_in()) {
  //         return new WP_Error('rest_not_logged_in', 'REST API доступен только авторизованным.', ['status' => 401]);
  //     }
  //     return $result;
  // });

  // ---------- Убираем лишние пункты из админ-меню ----------
  // Раскомментируй, если нужно:
  // remove_menu_page('edit-comments.php'); // Комментарии
});

// ---------- Убираем «мусорные» ссылки из админ-бара ----------
add_action('admin_bar_menu', function ($wp_admin_bar) {
  $wp_admin_bar->remove_node('wp-logo');         // логотип WordPress
  $wp_admin_bar->remove_node('comments');        // комментарии
  $wp_admin_bar->remove_node('new-content');     // добавить
}, 999);

// ---------- Отключаем XML-RPC (защита от брутфорса) ----------
add_filter('xmlrpc_enabled', '__return_false');

// ---------- Убираем «мусор» из <head> для безопасности ----------
remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_empty_string');
