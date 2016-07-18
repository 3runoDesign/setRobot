<?php
/**
 * AssetManifest class
 *
 * Regulate the CSS and JS assets.
 */

class AssetManifest
{
    /**
     * [$fileJson Path json]
     *
     * @var [string]
     */
    private $fileJson;

    /**
     * [$jsonValid If the json is valid]
     *
     * @var [boolean]
     */
    private $jsonValid = false;

    /**
     * [__construct initial]
     *
     * @param [string] $json [Get path json]
     */
    public function __construct($json = null)
    {
        $this->fileJson = $this->isJsonValidator($json) ? file_get_contents($json) : false;
    }

    /**
     * [isJsonValidator Function to validate if there json.]
     *
     * @param  [string]  $json [Path json]
     * @return boolean
     */
    private function isJsonValidator($json)
    {
        $this->jsonValid = (!is_null($json) && file_exists($json)) ? true : false;
        return $this->jsonValid;
    }

    /**
     * [explodeString Function to dismember the file name.]
     *
     * @param  [string] $file
     * @param  [boolean] $min  [Add slug of minification]
     * @return [string]
     */
    private function explodeString($file, $min)
    {
        $min = is_bool($min) ? $min : false;
        $filename       = preg_replace('/\.[^.]+$/', '', $file);
        $fileExtension = substr($file, strrpos($file, '.') + 1);;

        return ($min) ? $filename . '.min.' . $fileExtension : $file;
    }

    /**
     * [getFile Get the file in the manifest ]
     *
     * @param  [string] $file [File]
     * @return [string]
     */
    public function getFile($file)
    {
        if ($this->jsonValid) {
            $manifest = json_decode($this->fileJson, true);

            if (array_key_exists($this->explodeString($file, true), $manifest)) {
                return get_template_directory_uri() . ASSETS_REV . '/' . $manifest[ $this->explodeString($file, true) ];
            }

            trigger_error(sprintf('Não foi possível localizar o arquivo [ %s ] em produção!', $file), E_USER_ERROR);
        }

        return get_template_directory_uri() . ASSETS_PUB . '/' . $this->explodeString($file, false);
    }
}
