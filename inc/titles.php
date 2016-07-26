<?php

function wp_title_app($title)
{
    if (is_feed()) {
        return $title;
    }
    $title .= get_bloginfo('name');

    return $title;
}
add_filter('wp_title', 'wp_title_app', 10);
