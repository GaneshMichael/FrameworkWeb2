<?php

require_once __DIR__ . '/../vendor/autoload.php';


$router = require_once __DIR__ . '/../App/Core/Routes.php'; // Include route definitions

$uri = $_SERVER['REQUEST_URI'];
$router->dispatch($uri);
