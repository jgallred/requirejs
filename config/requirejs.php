<?php

/*
|--------------------------------------------------------------------------
| RequireJS Bundle Configuration
|--------------------------------------------------------------------------
|
| Copy this file to your application/config directory
|
*/

return array(    

	/*
	|--------------------------------------------------------------------------
	| RequireJS Build Profile
	|--------------------------------------------------------------------------
	|
	| The path to your RequireJS build profile for use by the optimizer
	|
	*/
    
    "build_profile" => path("public")."js/app.build.js",

	/*
	|--------------------------------------------------------------------------
	| RequireJS Optimizer Arguments
	|--------------------------------------------------------------------------
	|
	| Any arguments you want used by the optimize task in addition to the build
    | profile.
	|
	*/

    "build_args" => "",

	/*
	|--------------------------------------------------------------------------
	| RequireJS to load
	|--------------------------------------------------------------------------
	|
	| Specifies whether or not to load the minified copy of require.js when 
    | calling Requirejs::load_require()
	|
	*/
    
    "use_min_require" => true,

	/*
	|--------------------------------------------------------------------------
	| RequireJS Configuration
	|--------------------------------------------------------------------------
	|
	| Any configurations to be set before require.js is loaded. They will be
    | inserted into the page when you call Requirejs::config().
    | See http://requirejs.org/docs/api.html#config
	|
	*/

    "config" => array(
		"baseUrl" => "js/app/",
        "paths" => array(
            
        )
    )
);