<?php
function setup_content()
{
    /**
     * Enable plugins to manage the document title
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post formats
     * @link http://codex.wordpress.org/Post_Formats
     */
    add_theme_support('post-formats', [
        'aside',
        'gallery',
        'link',
        'image',
        'quote',
        'video',
        'audio'
    ]);

    /**
     * Enable HTML5 markup support
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form'
    ]);
}
add_action('after_setup_theme', 'setup_content');
