<?php

namespace SetRobot\Assets;

interface ManifestInterface
{
    public function get($asset);
    public function getUri($asset);
}
