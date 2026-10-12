<?php

/**
 * Хелпер-функции темы
 */

if (!defined('ABSPATH')) exit;

/**
 * Рендер модального окна
 */
function itlant_render_modal()
{
  get_template_part('template-parts/modal');
}

/**
 * Рендер хлебных крошек
 */
function itlant_breadcrumbs()
{
  get_template_part('template-parts/breadcrumbs');
}

/**
 * Получить email из Customizer
 */
function itlant_get_email()
{
  return get_theme_mod('contact_email', 'hello@itlant.ru');
}

/**
 * Получить телефон из Customizer
 */
function itlant_get_phone()
{
  return get_theme_mod('contact_phone', '');
}

/**
 * Вывод excerpt нужной длины
 */
function itlant_excerpt($length = 25)
{
  return wp_trim_words(get_the_excerpt(), $length, '...');
}

/**
 * Убирает пустые <p> из контента
 */
add_filter('the_content', function ($content) {
  // Убираем <p>&nbsp;</p> и <p></p>
  $content = preg_replace('/<p>(&nbsp;|\s)*<\/p>/i', '', $content);
  return $content;
}, 20);

/**
 * Добавляет класс nav__link к <a> в меню
 */
add_filter('nav_menu_link_attributes', function ($atts, $item, $args, $depth) {
  if (!isset($args->theme_location)) {
    return $atts;
  }

  // Добавляем наш класс для главного меню
  if ($args->theme_location === 'primary' || $args->theme_location === 'footer') {
    $atts['class'] = isset($atts['class'])
      ? $atts['class'] . ' nav__link'
      : 'nav__link';
  }

  return $atts;
}, 10, 4);

/**
 * Добавляет класс nav__item к <li> в меню
 */
add_filter('nav_menu_css_class', function ($classes, $item, $args, $depth) {
  if (!isset($args->theme_location)) {
    return $classes;
  }

  if ($args->theme_location === 'primary') {
    $classes[] = 'nav__item';
  }

  if ($args->theme_location === 'footer') {
    $classes[] = 'footer__nav-item';
  }

  return $classes;
}, 10, 4);
