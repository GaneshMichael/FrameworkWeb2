<?php

use TCG\Controllers\AdminController;
use TCG\Controllers\AuthController;
use TCG\Controllers\CardController;
use TCG\Controllers\DashboardController;
use TCG\Controllers\DeckController;
use TCG\Controllers\HomeController;
use TCG\Controllers\SiteController;
use TCG\Core\MiddleWares\AdminMiddleware;
use TCG\Core\MiddleWares\AuthMiddleware;
use TCG\Core\MiddleWares\PremiumMiddleware;

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
$app->router->get('/decks/deck1', [DeckController::class, 'deck1'], PremiumMiddleware::class);
$app->router->get('/decks/deck2', [DeckController::class, 'deck2'], PremiumMiddleware::class);
$app->router->get('/decks/deck3', [DeckController::class, 'deck3'], PremiumMiddleware::class);

// Admin
$app->router->get('/admin', [AdminController::class, 'dashboard'], AdminMiddleware::class);
$app->router->get('/admin/users', [AdminController::class, 'userIndex'], AdminMiddleware::class);
$app->router->get('/admin/users/edit', [AdminController::class, 'editUser'], AdminMiddleware::class);
$app->router->post('/admin/users/update', [AdminController::class, 'updateUser'], AdminMiddleware::class);
$app->router->post('/admin/users/delete', [AdminController::class, 'deleteUser'], AdminMiddleware::class);
$app->router->get('/admin/cards', [AdminController::class, 'cardIndex'], AdminMiddleware::class);
$app->router->get('/admin/cards/addCard', [AdminController::class, 'addCards'], AdminMiddleware::class);
$app->router->post('/admin/cards/addCard', [AdminController::class, 'registerCard'], AdminMiddleware::class);
$app->router->post('/admin/cards/delete', [AdminController::class, 'deleteCard'], AdminMiddleware::class);
