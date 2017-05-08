<?php

namespace SetRobot\Assets;

if (! defined('ABSPATH')) { header('Location: /'); exit; }

interface ManifestInterface
{
    public function get($asset);
    public function getUri($asset);
}
