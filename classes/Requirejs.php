<?php

use \Laravel\HTML as HTML;
use \Laravel\Config as Config;
use \Laravel\Bundle as Bundle;

/**
 * Provides a handle for including the require.js script and related 
 * configuration in your view.
 *  
 * @author Jason Allred
 */
class Requirejs
{
    /**
     * Returns a script tag for requirejs. Passing a value for $main will
     * set the data-main attribute of the script.
     * 
     * @param string $main The module for require to load.
     * @param array $attributes 
     * 
     * @return string
     */
    public static function load_require($main = null, $attributes = array())
    {
        if(!is_null($main))
        {
            $attributes['data-main'] = $main;
        }

        return HTML::script(self::get_requirejs_path(), $attributes);
    }

    /**
     * Returns a script element with your configuration from applicaion/config/requirejs.php
     * Make sure you call this method before including the requirejs script in your view
     * 
     * @return string
     */
    public static function config()
    {
        if(self::config_has("config"))
        {
            return "<script type=\"text/javascript\"> var require = ".json_encode(self::config_get("config"))."</script>";
        }

        return "";
    }

    /**
     * Convienence method for loading both your configuration and the requirejs script
     * 
     * @param string $main The module for require to load.
     * @param array $attributes
     * 
     * @return string
     */
    public static function require_script_config($main = null, $attributes = array())
    {
        return self::config()."\n".self::load_require($main, $attributes);
    }

    /**
     * Convienence method for testing for configuration file values
     * 
     * @param string $attr
     * 
     * @return mixed
     */
    private static function config_has($attr)
    {
        return Config::has("requirejs.$attr");
    }

    /**
     * Convienence method for getting configuration file values
     * 
     * @param string $attr
     * 
     * @return mixed
     */
    private static function config_get($attr)
    {
        return Config::get("requirejs.$attr");
    }

    /**
     * Returns the path to the requirejs script based on whether or not the configuration file
     * indicates that the minified version should be used.
     * 
     * @return string
     */
    private static function get_requirejs_path()
    {
        if(self::config_has("use_min_require") && self::config_get("use_min_require"))
        {
            return Bundle::assets("requirejs")."require.js";
        }

        return Bundle::assets("requirejs")."require-min.js";
    }
}