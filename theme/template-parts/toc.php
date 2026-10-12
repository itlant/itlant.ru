<?php
/**
 * Оглавление статьи (сайдбар)
 */

if (!defined('ABSPATH')) exit;

// Получаем контент и ищем H2 с id
$content = get_the_content();
if (empty($content)) return;

// Находим все H2 с id
preg_match_all('/<h2[^>]*id=["\']([^"\']+)["\'][^>]*>(.*?)<\/h2>/is', $content, $matches);

if (empty($matches[1])) return;

$headings = [];
foreach ($matches[1] as $i => $id) {
    $headings[] = [
        'id'    => $id,
        'title' => wp_strip_all_tags($matches[2][$i]),
    ];
}
?>

<aside class="article-toc-sidebar" aria-label="Содержание статьи">
  <div class="article-toc-sidebar__inner">
    <h2 class="article-toc-sidebar__title">&gt; СОДЕРЖАНИЕ</h2>
    <ol class="article-toc-sidebar__list">
      <?php foreach ($headings as $i => $h) : ?>
        <li class="article-toc-sidebar__item">
          <a href="#<?php echo esc_attr($h['id']); ?>" class="article-toc-sidebar__link">
            <span class="article-toc-sidebar__num"><?php echo $i + 1; ?>.</span>
            <span><?php echo esc_html($h['title']); ?></span>
          </a>
        </li>
      <?php endforeach; ?>
    </ol>

    <!-- CTA в сайдбаре -->
    <div class="article-toc-sidebar__cta">
      <p class="article-toc-sidebar__cta-text">Нужна помощь с проектом?</p>
      <button class="btn btn--primary btn--block" data-modal-open>Обсудить</button>
    </div>
  </div>
</aside>