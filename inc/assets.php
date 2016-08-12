<?php
function add_assets_css()
{
    $pathJson = (WP_ENV != 'development') ? JSON_REV : '';
    $manifest = new AssetManifest($pathJson);

    wp_enqueue_style('setrobot/vendor_css',  $manifest->getFile('css/vendor.css'), false, null);
    wp_enqueue_style('setrobot/css',         $manifest->getFile('css/main.css'), false, null);

    wp_enqueue_script('setrobot/vendor_js',  $manifest->getFile('js/vendor.js'), array('jquery'), null, true);
    wp_enqueue_script('setrobot/js',         $manifest->getFile('js/main.js'), array('setrobot/vendor_js'), null, true);
}
add_action('wp_enqueue_scripts', 'add_assets_css');

function remove_head_scripts()
{
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
}
add_action('wp_enqueue_scripts', 'remove_head_scripts');

function remove_script_version($src)
{
    return $src ? esc_url(remove_query_arg('ver', $src)) : false;
}
add_filter('script_loader_src', 'remove_script_version', 15, 1);
add_filter('style_loader_src', 'remove_script_version', 15, 1);
