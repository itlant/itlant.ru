<?php

/**
 * Хлебные крошки с микроразметкой Schema.org (BreadcrumbList)
 * Без подкатегорий — только раздел и текущая страница.
 */

if (!defined('ABSPATH')) exit;

// Не показываем на главной
if (is_front_page()) return;

$items = [];

// 1. Главная — всегда первая
$items[] = [
  'title' => 'Главная',
  'url'   => home_url('/'),
];

// 2. Определяем контекст
if (is_singular('service')) {

  // Страница услуги
  $items[] = [
    'title' => 'Услуги',
    'url'   => get_post_type_archive_link('service'),
  ];

  // Текущая услуга
  $items[] = [
    'title' => get_the_title(),
    'url'   => '',
  ];
} elseif (is_singular('portfolio')) {

  // Страница проекта
  $items[] = [
    'title' => 'Портфолио',
    'url'   => get_post_type_archive_link('portfolio'),
  ];

  // Текущий проект
  $items[] = [
    'title' => get_the_title(),
    'url'   => '',
  ];
} elseif (is_singular('post')) {

  // Статья блога
  $items[] = [
    'title' => 'Блог',
    'url'   => get_permalink(get_option('page_for_posts')) ?: home_url('/blog/'),
  ];

  // Текущая статья
  $items[] = [
    'title' => get_the_title(),
    'url'   => '',
  ];
} elseif (is_post_type_archive('service')) {

  $items[] = [
    'title' => 'Услуги',
    'url'   => '',
  ];
} elseif (is_post_type_archive('portfolio')) {

  $items[] = [
    'title' => 'Портфолио',
    'url'   => '',
  ];
} elseif (is_home() || is_category()) {

  $items[] = [
    'title' => 'Блог',
    'url'   => '',
  ];

  if (is_category()) {
    $items[] = [
      'title' => single_cat_title('', false),
      'url'   => '',
    ];
  }
} elseif (is_page()) {

  // Обычная страница — только родительские страницы
  $ancestors = array_reverse(get_post_ancestors(get_the_ID()));
  foreach ($ancestors as $ancestor_id) {
    $items[] = [
      'title' => get_the_title($ancestor_id),
      'url'   => get_permalink($ancestor_id),
    ];
  }

  $items[] = [
    'title' => get_the_title(),
    'url'   => '',
  ];
} elseif (is_search()) {

  $items[] = [
    'title' => 'Поиск: ' . get_search_query(),
    'url'   => '',
  ];
} elseif (is_404()) {

  $items[] = [
    'title' => '404 — Страница не найдена',
    'url'   => '',
  ];
} elseif (is_tag()) {

  $items[] = [
    'title' => 'Блог',
    'url'   => get_permalink(get_option('page_for_posts')) ?: home_url('/blog/'),
  ];

  $items[] = [
    'title' => '#' . single_tag_title('', false),
    'url'   => '',
  ];
}

// Если только «Главная» — не показываем
if (count($items) === 1 && $items[0]['title'] === 'Главная') {
  return;
}
?>

<nav class="breadcrumbs container" aria-label="Хлебные крошки">
  <ol itemscope itemtype="https://schema.org/BreadcrumbList">
    <?php foreach ($items as $i => $item) :
      $position = $i + 1;
      $is_last  = ($i === count($items) - 1);
    ?>
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"
        <?php echo $is_last ? 'aria-current="page"' : ''; ?>>

        <?php if (!$is_last && !empty($item['url'])) : ?>
          <a itemprop="item" href="<?php echo esc_url($item['url']); ?>">
            <span itemprop="name"><?php echo esc_html($item['title']); ?></span>
          </a>
        <?php else : ?>
          <span itemprop="name"><?php echo esc_html($item['title']); ?></span>
        <?php endif; ?>

        <meta itemprop="position" content="<?php echo (int) $position; ?>">
      </li>
    <?php endforeach; ?>
  </ol>
</nav>