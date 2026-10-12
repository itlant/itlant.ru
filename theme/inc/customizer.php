<?php

/**
 * Настройки Customizer (Внешний вид → Настроить)
 */

if (!defined('ABSPATH')) exit;

add_action('customize_register', function ($wp_customize) {

  // ============================================
  // HERO-СЕКЦИЯ
  // ============================================
  $wp_customize->add_section('itlant_hero', [
    'title'    => 'Hero-секция (главная)',
    'priority' => 30,
  ]);

  $wp_customize->add_setting('hero_title', [
    'default'           => 'СОЗДАЁМ САЙТЫ,<br>КОТОРЫЕ РАБОТАЮТ',
    'sanitize_callback' => 'wp_kses_post',
  ]);
  $wp_customize->add_control('hero_title', [
    'label'   => 'Заголовок',
    'section' => 'itlant_hero',
    'type'    => 'textarea',
  ]);

  $wp_customize->add_setting('hero_subtitle', [
    'default'           => 'Веб-студия ITLANT: разработка, SEO-продвижение и реклама.',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('hero_subtitle', [
    'label'   => 'Подзаголовок',
    'section' => 'itlant_hero',
    'type'    => 'textarea',
  ]);

  // ============================================
  // КОНТАКТЫ
  // ============================================
  $wp_customize->add_section('itlant_contacts', [
    'title'    => 'Контакты',
    'priority' => 35,
  ]);

  $wp_customize->add_setting('contact_email', [
    'default'           => 'hello@itlant.ru',
    'sanitize_callback' => 'sanitize_email',
  ]);
  $wp_customize->add_control('contact_email', [
    'label'   => 'Email',
    'section' => 'itlant_contacts',
    'type'    => 'email',
  ]);

  $wp_customize->add_setting('contact_phone', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('contact_phone', [
    'label'   => 'Телефон',
    'section' => 'itlant_contacts',
    'type'    => 'text',
  ]);

  $wp_customize->add_setting('contact_telegram', [
    'default'           => '',
    'sanitize_callback' => 'esc_url_raw',
  ]);
  $wp_customize->add_control('contact_telegram', [
    'label'   => 'Ссылка на Telegram',
    'section' => 'itlant_contacts',
    'type'    => 'url',
  ]);

  // ============================================
  // CTA-СЕКЦИЯ
  // ============================================
  $wp_customize->add_section('itlant_cta', [
    'title'    => 'CTA-секция',
    'priority' => 40,
  ]);

  $wp_customize->add_setting('cta_title', [
    'default'           => 'ГОТОВЫ ОБСУДИТЬ ВАШ ПРОЕКТ?',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cta_title', [
    'label'   => 'Заголовок CTA',
    'section' => 'itlant_cta',
    'type'    => 'text',
  ]);

  $wp_customize->add_setting('cta_text', [
    'default'           => 'Ответим в течение 2 часов в рабочее время.',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cta_text', [
    'label'   => 'Текст CTA',
    'section' => 'itlant_cta',
    'type'    => 'textarea',
  ]);
});
