<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;
use App\Lib\Utils;
use StoutLogic\AcfBuilder\FieldsBuilder;

require_once dirname(get_stylesheet_directory()) . '/vendor/tgmpa/tgm-plugin-activation/class-tgm-plugin-activation.php';

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('setrobot/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('setrobot/main.js#defer', asset_path('scripts/main.js'), [], null, true);

    /*
    * Creates the 'setrobot' javascript object with useful URLs.
    */
    wp_localize_script(
        'setrobot/main.js#defer',
        'setrobot',
        [
            'homeUrl' => get_bloginfo('url'),
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'assetsUrl' => config('assets.uri')
        ]
    );
}, 100);

/**
 * Setup image sizes, post types and taxonomies
 */
add_action('init', function () {
    global $wp_rewrite;
    $wp_rewrite->search_base = 'search';
    /** Register custom image sizes here */
    // add_image_size('name', width, height, crop)
}, 0, 2);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
//    load_theme_textdomain('setrobot', get_template_directory() . '/languages');

    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('menus');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');

    // add_theme_support('woocommerce');
    // add_post_type_support('page', 'excerpt');

    add_editor_style(asset_path('styles/editor.css'));

    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'setrobot'),
    ]);
}, 100);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    $sidebars = [
        [
            'name' => __('Main', 'setrobot'),
            'id' => 'sidebar-main',
            $config
        ],

        [
            'name' => __('Footer', 'setrobot'),
            'id' => 'sidebar-footer',
            $config
        ]
    ];

    foreach ($sidebars as $sidebar) {
        register_sidebar($sidebar);
    }

});

/**
 * Update the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton(
        'sage.assets',
        function () {
            return new JsonManifest(
                config('assets.manifest'),
                config('assets.uri')
            );
        }
    );
    /**
     * Add Blade to Sage container
     */
    sage()->singleton(
        'sage.blade',
        function (Container $app) {
            $cachePath = config('view.compiled');
            if (!file_exists($cachePath)) {
                wp_mkdir_p($cachePath);
            }
            (new BladeProvider($app))->register();
            return new Blade($app['view']);
        }
    );

    $sageCompiler = sage('blade')->compiler();
    foreach (config('directives') as $directive => $fn) {
        $sageCompiler->directive($directive, $fn);
    }
});

/**
 * Setting Static Pages
 */
add_action('after_setup_theme', function () {
    (new Utils())->create_page([
        'Home',
        'Blog'
    ]);

    (new Utils())->setting_frontpage([
        'front_page' => 'Home',
        'blog_page' => 'Blog'
    ]);
});

/**
 * Plugins require
 */
add_action('tgmpa_register', function ()
{
    define('ACF_PRO_KEY', getenv('ACF_PRO_KEY'));
    define('ACF_PRO_VERSION', getenv('ACF_PRO_VERSION'));

    $acf = [
        'name'      =>  (ACF_PRO_KEY) ? 'Advanced Custom Fields (PRO)' : 'Advanced Custom Fields (FREE)',
        'slug'      => 'advanced-custom-fields',
        'required'  => true,
        'source' => (ACF_PRO_KEY) ? 'https://connect.advancedcustomfields.com/index.php?a=download&p=pro&k=' . ACF_PRO_KEY . ((ACF_PRO_VERSION) ? '&t=' . ACF_PRO_VERSION : '') : '',
        'force_activation'   => true,
        'force_deactivation' => false,
    ];

    $plugins = [
        $acf
    ];

    $theme_text_domain = 'wp_setrobot';

    $config = [
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',
        'strings'      => [
            'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
            'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
            'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
            'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
            'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
            'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
            'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
            'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        ]
    ];

    tgmpa( $plugins, $config );

    // Enable ACF pro version
    if (
        function_exists( 'acf' ) &&
        is_admin() &&
        !acf_pro_get_license_key()
    ) {
        acf_pro_update_license(ACF_PRO_KEY);
    }
});

/**
 * ACF Builder initialization and fields loading
 */
define('ACF_FIELDS_DIR', __DIR__ . '/Fields');

if (is_dir(ACF_FIELDS_DIR) && function_exists('acf_add_local_field_group')) {
    add_action('init', function () {
        collect(glob(ACF_FIELDS_DIR . '/*.php'))
            ->map(function ($field) {
                return require_once($field);
            })
            ->flatten()
            ->map(function ($field) {
                if ($field instanceof FieldsBuilder) {
                    acf_add_local_field_group($field->build());
                }
            });
    });
}
