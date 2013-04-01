<?php

/**
 * Artisan task for running the r.js optimizer
 *
 * @author Jason Allred
 */
class Requirejs_Optimize_Task
{

    /**
     * Run the r.js optimizer using node and the build profile designated in your config. Additionally
     * applies and other arguments.
     *
     * @param array $arguments Any additional arguments you want to pass to the optimizer
     *
     * @return int
     */
    public function run($arguments)
    {
        if(!Config::has("requirejs.build_profile_path")) {
            echo "You must specify a build_profile_path in the bundle config file.";
            return -1;
        }


        if(!Config::has("requirejs.build_profile")) {
            \Laravel\CLI\Command::run(array("requirejs::optimize:build_profile"));
        }

        $cmd = "node ".  path('public').Bundle::assets("requirejs")."r.js -o ".Config::get("requirejs.build_profile_path");

        if(Config::has("requirejs.build_args")) {
            $cmd .= " ".Config::get("requirejs.build_args");
        }

        if(count($arguments) > 0) {
            $cmd .= " ".implode(" ", $arguments);
        }

        echo "\n$cmd\n";
        passthru($cmd);
        return 0;
    }

    /**
     * Runs j.js without the build profile.
     *
     * @param array $arguments Any additional arguments you want to pass to the optimizer
     *
     * @return int
     */
    public function rjs($arguments)
    {
        $cmd = "node ". path('public').Bundle::assets("requirejs")."r.js";

        if(count($arguments) > 0) {
            $cmd .= " ".implode(" ", $arguments);
        }

        echo "\n$cmd\n";
        passthru($cmd);
        return 0;
    }

    public function build_profile()
    {
        if(!Config::has("requirejs.build_profile_path")) {
            echo "You must specify a build_profile_path in the bundle config file.";
            return -1;
        }

		$profile = "(".json_encode(Config::get("requirejs.build_profile")).")";

		$current = file_exists(Config::get("requirejs.build_profile_path")) ?
			file_get_contents(Config::get("requirejs.build_profile_path")) :
			"";

		if(strcmp($profile, $current) !== 0) {
			if(!file_put_contents(Config::get("requirejs.build_profile_path"), $profile)) {
				echo "Update build profile: Error writing to ".Config::get("requirejs.build_profile_path")."\n";
				return -1;
			}
			echo "Update build profile: Changes found. Build profile was updated\n";
		} else {
			echo "Update build profile: No changes. Build profile was not updated\n";
		}
        return 0;
    }
}
