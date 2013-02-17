# requirejs

Laravel bundle for managing Requirejs in your application

## Installation

1. Clone the repo into your Laravel bundles directory
2. Copy the bundle's config/requirejs.php to your application's config directory
3. Publish the bundle's assets with <code>php artisan bundle:publish</code>


## Using the Optimizer Task

The <code>requirejs::optimize</code> task lets you run the r.js optimizer within the artisan command. You need
to install node on your machine. Specify a [build profile](http://requirejs.org/docs/optimization.html#wholeproject) 
for your modules and set its location in requirejs.php. Then, from the command line, run <code>php artisan requirejs::optimize</code>.

## Loading require.js into your views

### Simply inserting the require.js script
```php
<html>
  <head>
  ...
  </head>
  <body>
  ...
  {{ Requirejs::load_require() }}
  </body>
</html>
```

### Inserting the require.js script with a main module
```php
<html>
  <head>
  ...
  </head>
  <body>
  ...
  {{ Requirejs::load_require("js/app/main") }}
  </body>
</html>
```

## Configuring require.js

Require gives you lots of configuration options. The [documentation](http://requirejs.org/docs/api.html#config) tells you that it can be loaded like this:
```html
<script>
var require = {
  "baseUrl" : "js/app/"
  "paths" : {
    ...
  }
}
</script>
```

This bundle lets you centralize your configuration in your application/config/requirejs.php file and then load it into your views. Just be sure to call <code>Requirejs::config()</code> before <code>Requirejs::load_require()</code>.

```php
<?php
return array(
  ...
  "config" => array(
    "baseUrl" => "js/app/",
    "paths" => array(
      ...
    )
  )
)
```

```php
<html>
  <head>
  ...
  </head>
  <body>
  ...
  {{ Requirejs::config() }}
  {{ Requirejs::load_require("js/app/main") }}
  </body>
</html>
```

Since you'll probably do this quite often, there's a method that can combine both calls.

```php
<html>
  <head>
  ...
  </head>
  <body>
  ...
  {{ Requirejs::require_script_config("js/app/main") }}
  </body>
</html>
```