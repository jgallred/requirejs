requirejs
================

Laravel bundle for managing Requirejs in your application

Installation

1. Clone the repo into your Laravel bundles directory
2. Copy the bundle's config/requirejs.php to your application's config directory
3. Publish the bundle's assets with <code>php artisan bundle:publish</code>


Using the Optimizer Task

The <code>requirejs::optimize</code> task lets you run the r.js optimizer within the artisan command. You need
to install node on your machine. Specify a build profile (http://requirejs.org/docs/optimization.html#wholeproject) 
for your modules and set its location in requirejs.php. Then, from the command line, run <code>php artisan requirejs::optimize</code>.