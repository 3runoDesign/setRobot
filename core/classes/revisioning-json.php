<?php
/**
 * SetRobot_Asset_Manifest class
 *
 * Regulate the CSS and JS assets.
 */

class SetRobot_Asset_Manifest
{
    /**
     * [$file_json Path json]
     *
     * @var [string]
     */
    private $file_json;

    /**
     * [$json_valid If the json is valid]
     *
     * @var [boolean]
     */
    private $json_valid;

    /**
     * [__construct initial]
     *
     * @param [string] $json [Get path json]
     */
    public function __construct($json = null)
    {
        $this->file_json = $this->is_json_validator($json) ? file_get_contents($json) : false;
    }

    /**
     * [is_json_validator Function to validate if there json.]
     *
     * @param  [string]  $json [Path json]
     * @return boolean
     */
    private function is_json_validator($json)
    {
        if (!is_null($json) && file_exists($json)) {
            $this->json_valid = true;
            return $this->json_valid;
        } else {
            $this->json_valid = false;
            return $this->json_valid;
        }
    }

    /**
     * [explode_string Function to dismember the file name.]
     *
     * @param  [string] $file
     * @param  [boolean] $min  [Add slug of minification]
     * @return [string]
     */
    private function explode_string($file, $min = false)
    {
        $filename       = preg_replace('/\.[^.]+$/', '', $file);
        $file_extension = substr($file, strrpos($file, '.') + 1);

        if ($min) {
            return  $filename . '.min.' . $file_extension;
        } else {
            return $file;
        }
    }

    /**
     * [get_file Get the file in the manifest ]
     *
     * @param  [string] $file [File]
     * @return [string]
     */
    public function get_file($file)
    {
        if ($this->json_valid) {
            $manifest = json_decode($this->file_json, true);

            if (array_key_exists($this->explode_string($file, true), $manifest)) {
                return get_template_directory_uri() . ASSETS_REV . '/' . $manifest[ $this->explode_string($file, true) ];
            } else {
                trigger_error(sprintf('Não foi possível localizar o arquivo [ %s ] em produção!', $file), E_USER_ERROR);
            }
        } else {
            return get_template_directory_uri() . ASSETS_PUB . '/' . $this->explode_string($file);
        }
    }
}
