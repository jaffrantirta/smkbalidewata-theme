<?php
function enqueue_jhg_styles()
{
    wp_enqueue_style(
        'tailwind-styles',
        get_stylesheet_directory_uri() . '/assets/css/tailwind.min.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/css/tailwind.min.css')
    );
    wp_enqueue_style(
        'jhg-header-styles',
        get_stylesheet_directory_uri() . '/assets/css/header.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/header.css'),
        'all'
    );
    wp_enqueue_style(
        'jhg-swiper',
        get_stylesheet_directory_uri() . '/assets/css/swiper.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/swiper.css'),
        'all'
    );
    wp_enqueue_style(
        'jhg-gallery',
        get_stylesheet_directory_uri() . '/assets/css/gallery.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/gallery.css'),
        'all'
    );
    wp_enqueue_style(
        'jhg-custom-scrollbar-styles',
        get_stylesheet_directory_uri() . '/assets/css/custom-scrollbar.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/custom-scrollbar.css'),
        'all'
    );

    wp_enqueue_script(
        'jhg-header-js',
        get_template_directory_uri() . '/assets/js/header.js',
        array(), // Dependencies, if any
        filemtime(get_template_directory() . '/assets/js/header.js'),
        true // Load in footer
    );
    wp_enqueue_script(
        'jhg-scripts',
        get_template_directory_uri() . '/assets/js/app.js',
        array(), // Dependencies, if any
        filemtime(get_template_directory() . '/assets/js/app.js'),
        true // Load in footer
    );

    wp_enqueue_script(
        'jhg-faq',
        get_template_directory_uri() . '/assets/js/faq.js',
        array(), // Dependencies, if any
        filemtime(get_template_directory() . '/assets/js/faq.js'),
        true // Load in footer
    );
    wp_localize_script('jhg-scripts', 'themeAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('theme_nonce'),
        'theme_url' => get_template_directory_uri(),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_jhg_styles');