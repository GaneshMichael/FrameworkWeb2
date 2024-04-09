<?php

use TCG\Controllers\AuthController;
use TCG\Controllers\DashboardController;
use TCG\Controllers\DeckController;
use TCG\Controllers\HomeController;
use TCG\Core\MiddleWares\AuthMiddleware;

//    Site
$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/dashboard', [DashboardController::class, 'index'], AuthMiddleware::class);

// AUTH
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/logout', [AuthController::class, 'logout']);

// Decks and Cards
$app->router->get('/decks', [DeckController::class, 'index']);
$app->router->get('/cardDatabase', [DeckController::class, 'index']);