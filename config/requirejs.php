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
);