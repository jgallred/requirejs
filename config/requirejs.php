<?php

/*
|--------------------------------------------------------------------------
| RequireJS Bundle Configuration
|--------------------------------------------------------------------------
|
| Copy this file to your application/config directory
|
*/


/*
|--------------------------------------------------------------------------
| RequireJS Paths
|--------------------------------------------------------------------------
|
| Putting your paths here will let you share it between your config and
| build profile
|
*/
$paths = array(

);

/*
|--------------------------------------------------------------------------
| RequireJS Shim
|--------------------------------------------------------------------------
|
| Putting your shim here will let you share it between your config and
| build profile
|
*/
$shim = array(

);

return array(

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
		/* Put your configuration here */

        // By putting the baseUrl in your application config, you can use
        // the path to your optimized scripts in your production enviornment
        // and the normal scripts on your local enviornment
        "baseUrl" => Config::get('application.requirejs_baseurl', 'js/app/'),

        "paths" => $paths,
		"shim" => $shim,
    ),

	/*
	|--------------------------------------------------------------------------
	| RequireJS Build Profile
	|--------------------------------------------------------------------------
	|
	| The path to your RequireJS build profile for use by the optimizer
	|
	*/

    "build_profile_path" => path("public")."js/app.build.js",

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
	| RequireJS Build Profile
	|--------------------------------------------------------------------------
	|
	| This data is written to the file at build_profile_path and used to
	| optimize your project.
	| See http://requirejs.org/docs/optimization.html#wholeproject
	|
	*/

	/* "build_profile" => array(
		'appDir' => "./app",
		'baseUrl' => ".",
		'dir' => "./app-build",
		'paths' => $paths,
		"shim" => $shim,
		'modules' => array(
			// Modules to have requirejs optimize
		)
	), */
);