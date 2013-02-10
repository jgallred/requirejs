<?php namespace Requirejs;

/**
 * Description of URL
 *
 * @author Jason
 */
class URL extends \Laravel\URL
{
	public static function to_module($module)
	{
		if(Support::config_get("load_optimized"))
        {
            if(!Support::config_has("build_dir"))
            {
                throw new Exception("No build directory specified in RequireJS config file.");
            }

            return Support::config_get("build_dir").$module;
        }
        else
        {
            if(!Support::config_has("app_dir"))
            {
                throw new Exception("No app directory specified in RequireJS config file.");
            }

            return Support::config_get("app_dir").$module;
        }
	}
}
