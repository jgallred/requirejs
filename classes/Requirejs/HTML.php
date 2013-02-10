<?php namespace Requirejs;

/**
 * Description of HTML
 *
 * @author Jason
 */
class HTML extends \Laravel\HTML
{
	public static function requirejs($main = null, $attributes = array())
	{
		if(!is_null($main))
		{
			$attributes['data-main'] = URL::to_module($main);
		}

		return '<script src="'.Support::get_requirejs_path().'"'.static::attributes($attributes).'></script>'.PHP_EOL;
	}

	public static function module($modulePath, $attributes = array())
	{
		$modulePath = URL::to_module($modulePath);
		return '<script src="'.$modulePath.'"'.static::attributes($attributes).'></script>'.PHP_EOL;
	}

	public static function requirejs_config()
	{
		if(!Support::config_has("config"))
        {
            throw new Exception("No config array in RequireJS config file.");
        }

        return "<script> var require = ".json_encode(Support::config_get("config"))."</script>";
	}
}
