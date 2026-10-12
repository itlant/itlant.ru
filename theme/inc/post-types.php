<?php

/**
 * Кастомные типы записей и таксономии
 */

if (!defined('ABSPATH')) exit;

add_action('init', function () {

  // ---------- Услуги ----------
  register_post_type('service', [
    'labels' => [
      'name'          => 'Услуги',
      'singular_name' => 'Услуга',
      'add_new'       => 'Добавить услугу',
      'add_new_item'  => 'Добавить новую услугу',
      'edit_item'     => 'Редактировать услугу',
      'all_items'     => 'Все услуги',
      'menu_name'     => 'Услуги',
    ],
    'public'       => true,
    'has_archive'  => 'uslugi',
    'menu_icon'    => 'dashicons-hammer',
    'menu_position' => 5,
    'supports'     => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
    'rewrite'      => ['slug' => 'uslugi', 'with_front' => false],
    'show_in_rest' => true,
  ]);

  // ---------- Портфолио ----------
  register_post_type('portfolio', [
    'labels' => [
      'name'          => 'Портфолио',
      'singular_name' => 'Проект',
      'add_new'       => 'Добавить проект',
      'add_new_item'  => 'Добавить новый проект',
      'edit_item'     => 'Редактировать проект',
      'all_items'     => 'Все проекты',
      'menu_name'     => 'Портфолио',
    ],
    'public'       => true,
    'has_archive'  => 'portfolio',
    'menu_icon'    => 'dashicons-portfolio',
    'menu_position' => 6,
    'supports'     => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
    'rewrite'      => ['slug' => 'portfolio', 'with_front' => false],
    'show_in_rest' => true,
  ]);

  // ---------- Категории для услуг ----------
  register_taxonomy('service_category', 'service', [
    'labels' => [
      'name'          => 'Категории услуг',
      'singular_name' => 'Категория услуги',
    ],
    'hierarchical'      => true,
    'public'            => true,
    'show_admin_column' => true,
    'rewrite'           => ['slug' => 'uslugi-category'],
    'show_in_rest'      => true,
  ]);

  // ---------- Категории для портфолио ----------
  register_taxonomy('portfolio_category', 'portfolio', [
    'labels' => [
      'name'          => 'Категории проектов',
      'singular_name' => 'Категория проекта',
    ],
    'hierarchical'      => true,
    'public'            => true,
    'show_admin_column' => true,
    'rewrite'           => ['slug' => 'portfolio-category'],
    'show_in_rest'      => true,
  ]);
});

// ---------- Сброс правил rewrite при активации ----------
add_action('after_switch_theme', function () {
  flush_rewrite_rules();
});
