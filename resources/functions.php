<?php

$setrobot_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: 'SetRobot &rsaquo; Error';
    $footer = '<a href="https://github.com/3runoDesign/setRobot/issues">Issues</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

if (version_compare('5.6.4', phpversion(), '>=')) {
    $setrobot_error('You must be using PHP 5.6.4 or greater.', 'Invalid PHP version');
}
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $setrobot_error('You must be using WordPress 4.7.0 or greater.', 'Invalid WordPress version');
}

if (!class_exists('SetRobot\\Container')) {
    if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
        $setrobot_error(
            'You must run <code>composer install</code> from the SetRobot directory.',
            'Autoloader not found.'
        );
    }
    require_once $composer;
}

array_map(function ($file) use ($setrobot_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $setrobot_error(sprintf('Error locating <code>%s</code> for inclusion.', $file), 'File not found');
    }
}, ['helpers', 'activation', 'setup', 'filters', 'admin', 'nav', 'lock']);

if (is_customize_preview() && isset($_GET['theme'])) {
    $setrobot_error('Theme must be activated prior to using the customizer.');
}

$setrobot_views = basename(dirname(__DIR__)).'/'.basename(__DIR__).'/views';
add_filter('stylesheet', function () use ($setrobot_views) {
    return dirname($setrobot_views);
});

add_filter('stylesheet_directory_uri', function ($uri) {
    return dirname($uri);
});

if ($setrobot_views !== get_option('stylesheet')) {
    update_option('stylesheet', $setrobot_views);
    wp_redirect($_SERVER['REQUEST_URI']);
    exit();
}
