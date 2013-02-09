<?php namespace Requirejs;

use \Laravel\Asset as Asset;
use \Laravel\HTML as HTML;

/**
 * @author Jason
 */
class Requirejs 
{    
    public static function require_script($main, $attributes = array()) 
    {        
        $attributes['data-main'] = Support::get_module_path($main);
        return HTML::script(Support::get_requirejs_path(), $attributes);
    }
    
    public static function script($module, $attributes = array()) 
    {        
        return HTML::script(Support::get_module_path($module), $attributes);
    }
    
    public static function config()
    {
        if(!Support::config_has("config")) 
        {
            throw new Exception("No config array in RequireJS config file.");
        }
        
        return "<script type=\"text/javascript\"> var require = ".json_encode(Support::config_get("config"))."</script>";
    }
    
    public static function add_require_asset($main, $dependencies = array(), $attributes = array())
    {
        $attributes['data-main'] = Support::get_module_path($main);
        self::add_asset("require", Support::get_requirejs_path(), $dependencies, $attributes);
    }
    
    public static function add_require_asset_to_container(\Laravel\Asset_Container $container, $main, $dependencies = array(), $attributes = array())
    {
        $attributes['data-main'] = Support::get_module_path($main);
        self::add_asset_to_container($container, "require", Support::get_requirejs_path(), $dependencies, $attributes);
    }

    public static function add_asset($name, $module, $dependencies = array(), $attributes = array()) 
    {
        Asset::add($name, Support::get_module_path($module), $dependencies, $attributes);
    } 
    
    public static function add_asset_to_container(\Laravel\Asset_Container $container, $name, $module, $dependencies = array(), $attributes = array())
    {
        $container->add($name, Support::get_module_path($module), $dependencies, $attributes);
    }
}