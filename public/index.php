<?php

require_once '../App/Core/Router.php';
use app\App\Core\Router;

require '../vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

try {
    $router = require '../App/Core/Routes.php';

    if (!($router instanceof Router)) {
        throw new Exception("Routes.php did not return a valid Router instance");
    }

    $router->dispatch($uri);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
