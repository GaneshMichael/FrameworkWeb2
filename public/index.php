
<?php

// public/index.php
require_once '../App/Core/Router.php';
use app\App\Core\Router;

$router = new Router();

// Definieer routes
$router->addRoute('/', function() {
return 'Home';
});

$router->addRoute('/register', function() {
return 'Register';
});

// Haal de huidige URL op
$request_uri = $_SERVER['REQUEST_URI'];
$url = parse_url($request_uri, PHP_URL_PATH);

// Behandel het verzoek met de router
echo $router->handleRequest($url);
