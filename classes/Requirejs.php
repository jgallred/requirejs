<?php

use \Laravel\HTML as HTML;
use \Laravel\Config as Config;
use \Laravel\Bundle as Bundle;

/**
 * @author Jason Allred
 */
class Requirejs
{
    public static function load_require($main = null, $attributes = array())
    {
        if(!is_null($main))
        {
            $attributes['data-main'] = $main;
        }

        return HTML::script(self::get_requirejs_path(), $attributes);
    }

    public static function config()
    {
        if(self::config_has("config"))
        {
            return "<script type=\"text/javascript\"> var require = ".json_encode(self::config_get("config"))."</script>";
        }

        return "";
    }

    public static function require_script_config($main = null, $attributes = array())
    {
        return self::config()."\n".self::load_require($main, $attributes);
    }

    private static function config_has($attr)
    {
        return Config::has("requirejs.$attr");
    }

    private static function config_get($attr)
    {
        return Config::get("requirejs.$attr");
    }

    private static function get_requirejs_path()
    {
        if(self::config_has("use_min_require") && self::config_get("use_min_require"))
        {
            return Bundle::assets("requirejs")."require.js";
        }

        return Bundle::assets("requirejs")."require-min.js";
    }
}