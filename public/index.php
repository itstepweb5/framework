<?php

// 1. Bootstrap application
require(dirname(dirname(__FILE__)) . '/vendor/autoload.php');
require(dirname(dirname(__FILE__)) . '/core/Helpers/load.php');


$request = Step\Http\Request::instance();

echo $request->input('name');

//$app = new Step\Application();

// 2. Process request
//$response = $app->handle(new Step\Http\Request());

// 3. Return response
//$response->send();