
<?php

// public/index.php
require_once '../App/Core/Router.php';
use app\App\Core\Router;
require '../vendor/autoload.php';


$uri = $_SERVER['REQUEST_URI'];
$router = new Router();
$router->dispatch($uri);