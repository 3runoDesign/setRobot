<?php

namespace App;

if (! defined('ABSPATH')) { header('Location: /'); exit; }

use Illuminate\Contracts\Container\Container as ContainerContract;
use SetRobot\Assets\JsonManifest;
use SetRobot\Config;
use SetRobot\Template\Blade;
use SetRobot\Template\BladeProvider;

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('setrobot/vendor.css', asset_path('assets/css/vendor.css'), false, null);
    wp_enqueue_style('setrobot/main.css', asset_path('assets/css/main.css'), false, null);

    wp_enqueue_script('setrobot/vendor.js', asset_path('assets/js/vendor.js'), ['jquery'], null, true);
    wp_enqueue_script('setrobot/main.js', asset_path('assets/js/main.js'), ['setrobot/vendor.js'], null, true);
}, 100);


add_action('after_setup_theme', function () {
    add_theme_support('title-tag');

    register_nav_menus([
        'primary_navigation' => 'Primary Navigation'
    ]);

    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['caption', 'gallery', 'search-form']);
    add_theme_support('customize-selective-refresh-widgets');
    add_editor_style(asset_path('assets/css/main.css'));

    // CleanUp
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}, 20);

add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => 'Primary',
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => 'Footer',
        'id'            => 'sidebar-footer'
    ] + $config);
});

add_action('the_post', function ($post) {
    setrobot('blade')->share('post', $post);
});

add_action('after_setup_theme', function () {
    $paths = [
        'dir.stylesheet' => get_stylesheet_directory(),
        'dir.template'   => get_template_directory(),
        'dir.upload'     => wp_upload_dir()['basedir'],
        'uri.stylesheet' => get_stylesheet_directory_uri(),
        'uri.template'   => get_template_directory_uri(),
    ];
    $viewPaths = collect(preg_replace('%[\/]?(resources/views)?[\/.]*?$%', '', [STYLESHEETPATH, TEMPLATEPATH]))
        ->flatMap(function ($path) {
            return ["{$path}/resources/views", $path];
        })->unique()->toArray();

    config([
        'assets.manifest' => "{$paths['dir.stylesheet']}/../dist/assets.json",
        'assets.uri'      => "{$paths['uri.stylesheet']}/dist",
        'view.compiled'   => "{$paths['dir.upload']}/cache/compiled",
        'view.namespaces' => ['App' => WP_CONTENT_DIR],
        'view.paths'      => $viewPaths,
    ] + $paths);

    setrobot()->singleton('setrobot.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    setrobot()->singleton('setrobot.blade', function (ContainerContract $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view'], $app);
    });

    setrobot('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= App\\asset_path({$asset}); ?>";
    });
});

setrobot()->bindIf('config', Config::class, true);

add_action('after_setup_theme', function () {
    $filepath = dirname(__DIR__).'/post_types/';
    $files = scandir($filepath);
    foreach ($files as $file) {
        // match the file extension to cpt-*.php
        if (substr($file, -4, 4) == '.php' && substr($file, 0, 4) == 'cpt-') {
            include_once($filepath.$file);
        }
    }
});
