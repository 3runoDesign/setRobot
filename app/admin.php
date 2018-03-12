<?php

namespace App;

/**
 * Set login page logo redirecting to home url
 */
add_filter('login_headerurl', function () {
    return get_home_url();
});

//TODO: Adicionar estilização do painel

/**
 * If WP_ENV is set, append the environment name to the admin bar for current environment clarity.
 */
if (defined('WP_ENV')) {
    add_action('admin_bar_menu', function ($wp_admin_bar) {
        $env = strtolower(WP_ENV);
        $wp_admin_bar->add_node([
            'id'    => 'current_env',
            'title' => __('Environment', 'setrobot') . ': '. ucfirst($env),
            'meta'  => ['class' => 'admin-bar__current-env is-'.$env],
            'parent' => 'top-secondary',
        ]);
    }, 999);
    $adminbarCustomStylFn = function () {
        echo '<style>
            #wpadminbar .admin-bar__current-env .ab-item{
                color:#f4f3f4!important;
                background-color: #fe3055!important
            }
            
            #wpadminbar .admin-bar__current-env[class*="is-staging"] .ab-item{
                background-color: #ffd84d!important
            }
            
            #wpadminbar .admin-bar__current-env[class*="is-production"] .ab-item{
                background-color: #20be51!important
            }
        </style>';
    };
    add_action('admin_head', $adminbarCustomStylFn);
    if (!is_admin() && is_user_logged_in()) {
        add_action('wp_head', $adminbarCustomStylFn);
    }
}
