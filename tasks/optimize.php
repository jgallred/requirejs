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
        if(!Config::has("requirejs.build_profile")) {
            echo "You must specify a build_profile in the bundle config file.";
            return -1;
        }

        $cmd = "node ".path("public")."bundles/requirejs/r.js -o ".Config::get("requirejs.build_profile");

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
        $cmd = "node ".path("public")."bundles/requirejs/r.js";

        if(count($arguments) > 0) {
            $cmd .= " ".implode(" ", $arguments);
        }

        echo "\n$cmd\n";
        passthru($cmd);
        return 0;
    }
}