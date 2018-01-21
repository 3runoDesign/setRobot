<?php

namespace SetRobot\Assets;

class JsonManifest implements ManifestInterface
{
    protected $manifest;
    protected $dist;

    public function __construct($manifestPath, $distUri)
    {
        $this->manifest = file_exists($manifestPath) ? json_decode(file_get_contents($manifestPath), true) : [];
        $this->dist = $distUri;
    }

    public function get($asset)
    {
        return isset($this->manifest[$asset]) ? $this->manifest[$asset] : $asset;
    }

    public function getUri($asset)
    {
        return "{$this->dist}/{$this->get($asset)}";
    }
}
