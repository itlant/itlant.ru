<?php

/**
 * SEO-доработки темы
 */

if (!defined('ABSPATH')) exit;

// ---------- Убираем дефолтный title-tag, если Rank Math уже работает ----------
// Rank Math сам управляет <title>, поэтому add_theme_support('title-tag') можно оставить —
// он не конфликтует.

// ---------- Убираем canonical, если Rank Math уже выводит ----------
// remove_action('wp_head', 'rel_canonical');

// ---------- Отключаем REST API ссылки в <head> ----------
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('template_redirect', 'rest_output_link_header', 11);

// ---------- Убираем лишние <link rel="alternate"> ----------
remove_action('wp_head', 'wp_oembed_add_discovery_links');

// ---------- Яндекс.Метрика (пример) ----------
add_action('wp_footer', function () {
  if (is_user_logged_in()) return; // не считаем админа
?>
  <!-- Yandex.Metrika counter -->
  <script type="text/javascript">
    (function(m, e, t, r, i, k, a) {
      m[i] = m[i] || function() {
        (m[i].a = m[i].a || []).push(arguments)
      };
      m[i].l = 1 * new Date();
      for (var j = 0; j < document.scripts.length; j++) {
        if (document.scripts[j].src === r) {
          return;
        }
      }
      k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
    ym(XXXXXXXX, "init", {
      clickmap: true,
      trackLinks: true,
      accurateTrackBounce: true,
      webvisor: true
    });
  </script>
  <noscript>
    <div><img src="https://mc.yandex.ru/watch/XXXXXXXX" style="position:absolute; left:-9999px;" alt=""></div>
  </noscript>
<?php
}, 100);
