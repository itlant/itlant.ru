<?php

/**
 * Настройки темы
 */

if (!defined('ABSPATH')) exit;

add_action('after_setup_theme', function () {

  // Заголовок страницы <title>
  add_theme_support('title-tag');

  // Миниатюры записей
  add_theme_support('post-thumbnails');

  // HTML5-разметка
  add_theme_support('html5', ['style', 'script', 'search-form', 'comment-form']);

  // Кастомный логотип
  add_theme_support('custom-logo', [
    'height'      => 40,
    'width'       => 200,
    'flex-height' => true,
    'flex-width'  => true,
  ]);

  // Меню
  add_theme_support('menus');

  // Поддержка широкого выравнивания (для блочного редактора)
  add_theme_support('align-wide');

  // Отключаем дефолтные размеры изображений? Оставляем — они полезны.
  // Регистрация меню
  register_nav_menus([
    'primary' => 'Основное меню',
    'footer'  => 'Меню в футере',
  ]);

  // Размеры изображений
  add_image_size('service-card', 600, 400, true);
  add_image_size('og-image', 1200, 630, true);
  add_image_size('portfolio-card', 800, 600, true);
});
