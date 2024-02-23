<?php

require_once __DIR__ . '/vendor/autoload.php';

use \App\Core\Application;

$app = new  Application();

$app->router->get('/', 'home');
$app->router->get('/decks', 'decks');
$app->router->get('/cardDatabase', 'cardDatabase' );
$app->router->get('/contact', 'contact' );

$app->run();