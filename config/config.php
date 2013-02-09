<?php

return array(    
    "use_min_require" => true,
    
    "rjs_location" => path("public")."bundles/requirejs/r.js",
    
    "build_profile" => path("public")."js/app/config/app.build.js",
    
    "build_args" => "",
    
    "load_optimized" => false,
    
    "build_dir" => "js/app-build/",
    
    "app_dir" => "js/app/",
    
    "config" => array(
        "paths" => array(
            "haha" => "two"
        )
    )
);