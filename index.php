<?php

require_once __DIR__ . '/vendor/autoload.php';

use \TCG\Core\Application;

$app = new  Application(__DIR__);

$app->router->get('/', 'home');
$app->router->get('/decks', 'decks');
$app->router->get('/cardDatabase', 'cardDatabase' );
$app->router->get('/contact', 'contact' );

$app->run();