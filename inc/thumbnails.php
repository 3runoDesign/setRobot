<?php

/**
 * [setup_thumbnails Adicionar os tamanhos dos thumbnails]
 */
function setup_thumbnails()
{
    /**
     * Enable post thumbnails
     * @link http://codex.wordpress.org/Post_Thumbnails
     * @link http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
     * @link http://codex.wordpress.org/Function_Reference/add_image_size
     */
    add_theme_support('post-thumbnails');
    //
    add_image_size('setrobot_thumbnail'); // Default WP
    // add_image_size( 'setrobot_thumbnail-cover', 250, '',    ['center', 'bottom']);
    // add_image_size( 'setrobot_thumbnail-medium', 300, '',   ['center', 'bottom']);
    // add_image_size( 'setrobot_thumbnail-read', 300, '',     ['center', 'bottom']);
    add_image_size('setrobot_thumbnail-loading', 12, '', ['center', 'bottom']);
}
add_action('after_setup_theme', 'setup_thumbnails');
