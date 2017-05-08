<?php

namespace App;

if (! defined('ABSPATH')) { header('Location: /'); exit; }

add_action('after_setup_theme', function () {
    $setrobot_error = function ($message, $subtitle = '', $title = '') {
        $title = $title ?: 'SetRobot &rsaquo; Error';
        $footer = '<a href="https://github.com/3runoDesign/setRobot/issues">Issues</a>';
        $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
        wp_die($message, $title);
    };

    array_map(function ($file) use ($setrobot_error) {
        $file = "../post_types/{$file}.php";
        if (!locate_template($file, true, true)) {
            $setrobot_error(sprintf('Error locating <code>%s</code> for inclusion.', $file), 'File not found');
        }
    }, []);
});
