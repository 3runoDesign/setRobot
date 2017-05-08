<?php

namespace App;

if (! defined('ABSPATH')) { header('Location: /'); exit; }

use SetRobot\Container;
use Illuminate\Contracts\Container\Container as ContainerContract;

/**
 * Get the container
 *
 * @param string $abstract
 * @param array  $parameters
 * @param ContainerContract $container
 * @return ContainerContract|mixed
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
function setrobot($abstract = null, $parameters = [], ContainerContract $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("setrobot.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\SetRobot\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return setrobot('config');
    }
    if (is_array($key)) {
        return setrobot('config')->set($key);
    }
    return setrobot('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    return setrobot('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return setrobot('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return setrobot('assets')->getUri($asset);
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('setrobot/display_sidebar', false);
    return $display;
}

/**
 * Page titles
 * @return string
 */
function title()
{
    if (is_home()) {
        if ($home = get_option('page_for_posts', true)) {
            return get_the_title($home);
        }
        return 'Latest Posts';
    }
    if (is_archive()) {
        return get_the_archive_title();
    }
    if (is_search()) {
        return sprintf('Search Results for %s', get_search_query());
    }
    if (is_404()) {
        return 'Not Found';
    }
    return get_the_title();
}

/**
 * Get Image URL
 * @param  [string] $filename [Image name]
 * @return string
 */
function getImage($filename)
{
    return  config('assets.uri') . '/img/' . $filename;
}

/**
 * Excerpt
 * @param  [string] $type [excerpt or title]
 * @param  [string] $limit [Word limit]
 * @return string
 */
function excerpt($type = 'excerpt', $limit = 40)
{
    $limit = (int) $limit;
    // Set excerpt type.
    switch ($type) {
        case 'title':
            $excerpt = get_the_title();
            break;
        default :
            $excerpt = get_the_excerpt();
            break;
    }
    return wp_trim_words($excerpt, $limit);
}
