<?php

namespace App;

if (! defined('ABSPATH')) { header('Location: /'); exit; }


add_action('after_setup_theme', function() {
    $pages = ['Home', 'Blog'];

    foreach ($pages as $singlepage) {
        $singlepage_id = get_option(strtolower(str_replace(' ', '_', $singlepage)) . '_id');
        $page = array(
            'post_title' => $singlepage,
            'post_content' => '',
            'post_status' => 'publish',
            'post_type' => 'page',
        );

        $page_exists = get_page_by_title( $page['post_title'] );

        if ( $page_exists == null ) {
            $insert = wp_insert_post( $page );
        }
    }
});
