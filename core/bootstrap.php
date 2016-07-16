<?php
    require_once __DIR__ . '/security.php';

    // Autoload composer
    require_once __DIR__ . '/../vendor/autoload.php';

    // Tipo do ambiente
    if (!WP_ENV) {
        defined('WP_ENV', 'production');
    }
