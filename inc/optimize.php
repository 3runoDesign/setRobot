<?php

function head_cleanup()
{
    // EditURI link
    remove_action('wp_head', 'rsd_link');

    // WP version.
    remove_action('wp_head', 'wp_generator');

    // Index link.
    remove_action('wp_head', 'index_rel_link');

    // Windows live writer.
    remove_action('wp_head', 'wlwmanifest_link');

    // Start link.
    remove_action('wp_head', 'start_post_rel_link', 10, 0);

    // Previous link.
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);

    // Links for adjacent posts
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

    // Emoji's
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}

add_action('after_setup_theme', 'head_cleanup');
