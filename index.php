<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Application;

$app = new  Application();

$app->router->get('/', function () {
require_once 'App/Views/home.php';
});

$app->router->get('/decks', function () {
    require_once 'App/Views/decks.php';
});

$app->router->get('/cardDatabase', function () {
    require_once 'App/Views/cardDatabase.php';
});

$app->run();