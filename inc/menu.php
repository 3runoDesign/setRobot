<?php

/**
 * [setup_menus Configurar os Menus]
 */
add_action('after_setup_theme', 'setup_menus');
function setup_menus()
{
    register_nav_menus([
        'main_menu' => 'Menu principal'
    ]);
}
