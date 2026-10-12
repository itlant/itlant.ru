<?php
/**
 * Подключение CSS и JS
 */

if (!defined('ABSPATH')) exit;

add_action('wp_enqueue_scripts', function () {

    // ---------- Хелпер: версия файла ----------
    $get_version = function ($file) {
        $path = ITLANT_DIR . $file;
        return file_exists($path) ? filemtime($path) : ITLANT_VERSION;
    };

    // ---------- Суффикс .min (только в prod) ----------
    $suffix = (defined('WP_DEBUG') && WP_DEBUG) ? '' : '.min';

    // ---------- 1. Локальные шрифты ----------
    $fonts_file = '/assets/css/fonts' . $suffix . '.css';
    wp_enqueue_style(
        'itlant-fonts',
        ITLANT_URI . $fonts_file,
        [],
        $get_version($fonts_file)
    );

    // ---------- 2. Основной CSS ----------
    $style_file = '/assets/css/style' . $suffix . '.css';
    wp_enqueue_style(
        'itlant-style',
        ITLANT_URI . $style_file,
        ['itlant-fonts'],
        $get_version($style_file)
    );

    // ---------- 3. Кастомный CSS ----------
    $custom_file = '/assets/css/custom' . $suffix . '.css';
    wp_enqueue_style(
        'itlant-custom',
        ITLANT_URI . $custom_file,
        ['itlant-style'],
        $get_version($custom_file)
    );

    // ---------- 4. CSS для раздела Услуги ----------
    if (is_singular('service') || is_post_type_archive('service') || is_tax('service_category')) {
        $service_file = '/assets/css/service' . $suffix . '.css';
        wp_enqueue_style(
            'itlant-service',
            ITLANT_URI . $service_file,
            ['itlant-style'],
            $get_version($service_file)
        );
    }

    // ---------- 5. CSS для раздела Портфолио ----------
    if (is_singular('portfolio') || is_post_type_archive('portfolio') || is_tax('portfolio_category')) {
        $portfolio_file = '/assets/css/portfolio' . $suffix . '.css';
        wp_enqueue_style(
            'itlant-portfolio',
            ITLANT_URI . $portfolio_file,
            ['itlant-style'],
            $get_version($portfolio_file)
        );
    }

    // ---------- 6. CSS для раздела Блог ----------
    // ВАЖНО: блог — это обычные записи WordPress (`post`), а не CPT
    if (is_home() || is_singular('post') || is_category() || is_tag() || is_author()) {
        $blog_file = '/assets/css/blog' . $suffix . '.css';
        wp_enqueue_style(
            'itlant-blog',
            ITLANT_URI . $blog_file,
            ['itlant-style'],
            $get_version($blog_file)
        );
    }

    // ---------- 7. CSS для форм CF7 ----------
    $form_file = '/assets/css/form' . $suffix . '.css';
    wp_enqueue_style(
        'itlant-form',
        ITLANT_URI . $form_file,
        ['itlant-style'],
        $get_version($form_file)
    );

    // ---------- 8. CSS для таблиц TablePress ----------
    $table_file = '/assets/css/table' . $suffix . '.css';
    wp_enqueue_style(
        'itlant-table',
        ITLANT_URI . $table_file,
        ['itlant-style'],
        $get_version($table_file)
    );

    // ---------- 9. Основной JS ----------
    $js_file = '/assets/js/main' . $suffix . '.js';
    wp_enqueue_script(
        'itlant-main',
        ITLANT_URI . $js_file,
        [],
        $get_version($js_file),
        true
    );

    // ---------- 10. Данные для JS ----------
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
    <?php
}, 1);