<?php
/**
 * ITLANT Theme bootstrap
 *
 * Этот файл только подключает модули из /inc/.
 * Вся логика — в отдельных файлах.
 */

if (!defined('ABSPATH')) exit;

// ============================================
// КОНСТАНТЫ ТЕМЫ
// ============================================
define('ITLANT_VERSION', '1.0.0');
define('ITLANT_DIR', get_template_directory());
define('ITLANT_URI', get_template_directory_uri());

// ============================================
// ПОДКЛЮЧЕНИЕ МОДУЛЕЙ
// ============================================
require_once ITLANT_DIR . '/inc/enqueue.php';
require_once ITLANT_DIR . '/inc/theme-support.php';
require_once ITLANT_DIR . '/inc/post-types.php';
require_once ITLANT_DIR . '/inc/customizer.php';
require_once ITLANT_DIR . '/inc/cleanup.php';
require_once ITLANT_DIR . '/inc/helpers.php';
require_once ITLANT_DIR . '/inc/seo.php';