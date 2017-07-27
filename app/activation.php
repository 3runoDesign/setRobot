<?php

namespace App;

if (! defined('ABSPATH')) { header('Location: /'); exit; }


add_action('after_setup_theme', function() {
    $pages = ['Home', 'Blog', 'Login'];

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

        // Use a static front page
        $home = get_page_by_title( 'Home' );
        update_option( 'page_on_front', $home->ID );
        update_option( 'show_on_front', 'page' );

        // Set the blog page
        $blog = get_page_by_title( 'Blog' );
        update_option( 'page_for_posts', $blog->ID );
    }
});
