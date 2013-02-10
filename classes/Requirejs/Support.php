<?php namespace Requirejs;

use \Laravel\Config as Config;

/**
 * @author Jason Allred
 */
class Support
{
    
    private static $require_loc = "bundles/requirejs/require.js";
    
    private static $require_min_loc = "bundles/requirejs/require-min.js";
    
    
    public static function get_module_path($module)
    {
        if(self::config_get("load_optimized")) 
        {
            if(!self::config_has("build_dir")) 
            {
                throw new Exception("No build directory specified in RequireJS config file.");
            }
            
            return self::config_get("build_dir").$module;
        } 
        else 
        {
            if(!self::config_has("app_dir")) 
            {
                throw new Exception("No app directory specified in RequireJS config file.");
            }
            
            return self::config_get("app_dir").$module;
        }
    }
    
    public static function config_has($attr) 
    {
        return Config::has("requirejs.$attr");
    }
    
    public static function config_get($attr)
    {
        return Config::get("requirejs.$attr");
    }
    
    public static function get_requirejs_path()
    {
        if(self::config_has("use_min_require") && self::config_get("use_min_require"))
        {
            return self::$require_min_loc;
        }
        return self::$require_loc;
    }
}
