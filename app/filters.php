<?php

namespace App;

if (! defined('ABSPATH')) { header('Location: /'); exit; }

add_filter('body_class', function (array $classes) {
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . 'Continued' . '</a>';
});

collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", function ($templates) {
        return collect($templates)->flatMap(function ($template) {
            $transforms = [
                '%^/?(resources[\\/]views)?[\\/]?%' => '',
                '%(\.blade)?(\.php)?$%' => ''
            ];
            $normalizedTemplate = preg_replace(array_keys($transforms), array_values($transforms), $template);
            return ["{$normalizedTemplate}.blade.php", "{$normalizedTemplate}.php"];
        })->toArray();
    });
});

add_filter('template_include', function ($template) {
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("setrobot/template/{$class}/data", $data, $template);
    }, []);
    echo template($template, $data);
    return get_theme_file_path('index.php');
}, PHP_INT_MAX);

add_filter('comments_template', 'App\\template_path');
