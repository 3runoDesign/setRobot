<?php
/**
 * setRobot blade setting.
 */

require_once __DIR__ . '/../core/security.php';

use TorMorten\View\Blade;

$blade = Blade::create();

add_theme_support('blade-templates');
