<?php

// 1. Bootstrap application
define("PATH_ROOT", dirname(dirname(__FILE__)));
require(PATH_ROOT . '/vendor/autoload.php');
require(PATH_ROOT . '/core/Helpers/load.php');

$request = Step\Http\Request::instance();

$app = new Step\Application();

// 2. Process request
$response = $app->handle(new Step\Http\Request());

// 3. Return response
$response->send();