<?php
/**
 * Task for running the r.js optimizer
 *
 * @author Jason Allred
 */
class Requirejs_Optimize_Task
{

    /**
     * Run the r.js optimizer using node and the config file build profile. Additionally applies
     * and other args
     * @param array $arguments
     * @return int
     */
    public function run($arguments)
    {
        if(!Config::has("requirejs::config.rjs_location")) {
            echo "You must specify the location of the r.js file.";
            return -1;
        }

        if(!Config::has("requirejs::config.build_profile")) {
            echo "You must specify a build_profile in the bundle config file.";
            return -1;
        }

        $cmd = "node ".path("public")."bundles/requirejs/r.js -o ".Config::get("requirejs::config.build_profile");

        if(Config::has("requirejs::config.build_args")) {
            $cmd .= " ".Config::get("requirejs::config.build_args");
        }

        if(count($arguments) > 0) {
            $cmd .= " ".implode(" ", $arguments);
        }

        echo "\n$cmd\n";
        passthru($cmd);
        return 0;
    }

    /**
     *
     * @param array $arguments
     * @return int
     */
    public function rjs($arguments)
    {
        if(!Config::has("requirejs::config.rjs_location")) {
            echo "You must specify the location of the r.js file.";
            return -1;
        }

        $cmd = "node ".path("public")."bundles/requirejs/r.js";

        if(count($arguments) > 0) {
            $cmd .= " ".implode(" ", $arguments);
        }

        echo "\n$cmd\n";
        passthru($cmd);
        return 0;
    }
}