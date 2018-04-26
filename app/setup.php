<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;
use App\Lib\Utils;
use StoutLogic\AcfBuilder\FieldsBuilder;

define('ACF_FIELDS_DIR', __DIR__ . '/Fields');

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {

    wp_enqueue_style('setrobot/app.css', asset_path('styles/app.css'), false, null);

    if (file_exists(config('theme.dir') . '/dist/styles/vue-css.css')) {
        wp_enqueue_style('setrobot/vue.css', asset_path('styles/vue-css.css'), false, null);
    }

    wp_enqueue_script('setrobot/manifest.js', asset_path('scripts/manifest.js'), ['jquery'], null, true);
    wp_enqueue_script('setrobot/vendor.js', asset_path('scripts/vendor.js'), ['setrobot/manifest.js'], null, true);
    wp_enqueue_script('setrobot/app.js#defer', asset_path('scripts/app.js'), ['setrobot/vendor.js'], null, true);

    /*
    * Creates the 'setrobot' javascript object with useful URLs.
    */
    wp_localize_script(
        'setrobot/manifest.js',
        'setrobot',
        [
            'homeUrl' => get_bloginfo('url'),
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'assetsUrl' => config('assets.uri'),
            'font_google' => explode('|', 'Varela+Round')
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

    load_theme_textdomain('setrobot', get_template_directory() . '/lang');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'setrobot')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('css/app.css'));

    /**
     * Declare WooCommerce theme support
     * https://roots.io/using-woocommerce-with-sage/
     */
    // add_theme_support('woocommerce');

    (new \App\Lib\Lock());
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
        'Blog',
        'Login',
        'Register',
        'Lost Password',
        'Reset Pass',
        'Profile user'

    ]);

    (new Utils())->setting_frontpage([
        'front_page' => 'Home',
        'blog_page' => 'Blog'
    ]);
});

/**
 * Required Plugins
 */
add_action('tgmpa_register', function () {
    define('ACF_PRO_KEY', getenv('ACF_PRO_KEY'));
    define('ACF_PRO_VERSION', getenv('ACF_PRO_VERSION'));

    $url_acf_base = 'https://connect.advancedcustomfields.com/index.php';
    $url_acf_base .= '?a=download&p=pro&k=' . ACF_PRO_KEY;
    $url_acf_base .= ((ACF_PRO_VERSION) ? '&t=' . ACF_PRO_VERSION : '');

    $acf = [
        'name' => (ACF_PRO_KEY) ? 'Advanced Custom Fields (PRO)' : 'Advanced Custom Fields (FREE)',
        'slug' => 'advanced-custom-fields',
        'required' => true,
        'source' => (ACF_PRO_KEY) ? $url_acf_base : '',
        'force_activation' => true,
        'force_deactivation' => false,
    ];

    $plugins = [
        $acf,
        [
            'name' => 'Fancy Admin UI',
            'slug' => 'fancy-admin-ui',
            'required'  => true,
            'force_activation' => true,
            'force_deactivation' => false,
        ]
    ];

    tgmpa($plugins);

    // Enable ACF pro version
    if (function_exists('acf') && is_admin() && !acf_pro_get_license_key()) {
        acf_pro_update_license(ACF_PRO_KEY);
    }
});

/**
 * ACF Builder initialization and fields loading
 */

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
