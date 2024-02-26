<?php

require_once __DIR__ . '/vendor/autoload.php';

use TCG\Controllers\AuthController;
use TCG\Controllers\HomeController;
use TCG\Controllers\SiteController;
use TCG\Core\Application;

$app = new Application((__DIR__));

$app->router->get('/', [HomeController::class, 'home']);

$app->router->get('/decks', [SiteController::class, 'decks'] );
$app->router->get('/cardDatabase', [SiteController::class, 'cardDatabase'] );

$app->router->get('/contact', [SiteController::class, 'contact'] );
$app->router->post('/contact', [SiteController::class, 'handleContact']);

$app->router->get('/login', [AuthController::class, 'login'] );
$app->router->post('/login', [AuthController::class, 'login'] );

$app->router->get('/register', [AuthController::class, 'register'] );
$app->router->post('/register', [AuthController::class, 'register'] );



$app->run();