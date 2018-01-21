<?php

namespace App;

if (! defined('ABSPATH')) {
    header('Location: /');
    exit;
}

add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('setrobot/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});
