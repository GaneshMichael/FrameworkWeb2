<?php

use TCG\Controllers\AdminController;
use TCG\Controllers\AuthController;
use TCG\Controllers\CardController;
use TCG\Controllers\DashboardController;
use TCG\Controllers\DeckController;
use TCG\Controllers\HomeController;
use TCG\Controllers\SiteController;
use TCG\Core\MiddleWares\AuthMiddleware;

//    Site
$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/dashboard', [DashboardController::class, 'index'], AuthMiddleware::class);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/premium', [SiteController::class, 'premium']);

// AUTH
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/logout', [AuthController::class, 'logout']);

// Decks and Cards
$app->router->get('/decks', [DeckController::class, 'index']);
$app->router->get('/cardDatabase', [CardController::class, 'index']);

// Admin
$app->router->get('/admin', [AdminController::class, 'index'], AuthMiddleware::class);