<?php
$setrobot_includes = [
    'core/bootstrap.php',

    'core/classes/breadcrumb-navigation.php',
    'core/classes/post-status.php',
    'core/classes/revisioning-json.php',
    'core/classes/taxonomy-single-term.php',
    'core/classes/thumbs-media-downsize.php',

    'core/helpers/copyright-data.php',
    'core/helpers/image.php',
    'core/helpers/read.php',

    'inc/admin.php',
    'inc/assets.php',
    'inc/blade.php',
    'inc/content.php',
    'inc/copyright.php',
    'inc/menu.php',
    'inc/optimize.php',
    'inc/pagination.php',
    'inc/thumbnails.php',
    'inc/titles.php',

    'custom-post-types/post.php',
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
