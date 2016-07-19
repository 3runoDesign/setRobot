<?php
$setrobot_includes = [
    'core/bootstrap.php',

    'core/classes/revisioning-json.php',
    // 'core/classes/taxonomy-single-term.php',
    'core/classes/thumbs-media-downsize.php',

    'inc/assets.php',
    'inc/blade.php',
    'inc/copyright.php',
    'inc/optimize.php',
    'inc/thumbnails.php',
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
