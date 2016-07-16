<?php

require_once __DIR__ . '/vendor/autoload.php';

$setrobot_includes = [
    'inc/optimize.php',
];

/**
 * Loop dos nossos includes
 */
foreach ($setrobot_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf('Não foi possível localizar o arquivo %s.', $file), E_USER_ERROR);
    }
    require_once $filepath;
}
unset($file, $filepath);
