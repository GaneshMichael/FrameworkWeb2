<?php

require_once __DIR__ . '/vendor/autoload.php';

use TCG\Controllers\HomeController;
use TCG\Controllers\SiteController;
use TCG\Core\Application;

$app = new Application((__DIR__));

$app->router->get('/', [HomeController::class, 'home']);
$app->router->get('/decks', 'decks');
$app->router->get('/cardDatabase', 'cardDatabase' );
$app->router->get('/contact', [SiteController::class, 'contact'] );
$app->router->get('/login', 'Login' );
$app->router->post('/contact', [SiteController::class, 'handleContact']);

$app->run();