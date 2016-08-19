<?php

function admin_remove_dashboard_widgets()
{
    // remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    // remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_secondary', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');

    // Yoast's SEO
    remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'admin_remove_dashboard_widgets');

function admin_footer()
{
    return '&copy;' . date('Y') . ' - ' . get_bloginfo('name');
}
add_filter('admin_footer_text', 'admin_footer');

remove_action('welcome_panel', 'wp_welcome_panel');
