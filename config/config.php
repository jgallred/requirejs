<?php

return array(
    "use_min_require" => true,

    "build_profile" => path("public")."js/app/config/app.build.js",

    "build_args" => "",

    "load_optimized" => false,

    "build_dir" => "js/app-build/",

    "app_dir" => "js/app/",

    "config" => array(
		//"baseUrl" => "js/app/",
        "paths" => array(
            "haha" => "two"
        )
    )
);