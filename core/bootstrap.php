<?php
    require_once __DIR__ . '/security.php';

    // Autoload composer
    require_once __DIR__ . '/../vendor/autoload.php';

    // Tipo do ambiente
    if (!WP_ENV) {
        define('WP_ENV', 'production');
    }

    define('ASSETS_PUB', '/assets');
    define('ASSETS_REV', ASSETS_PUB);
    define('JSON_REV', get_template_directory() . ASSETS_REV .'/rev-manifest.json');
