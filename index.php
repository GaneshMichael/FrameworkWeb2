<?php

require_once __DIR__ . '/vendor/autoload.php';

use TCG\Core\Application;

$app = new Application();

$app->router->get('/', function () {
require_once 'App/Views/home.php';
});

$app->run();