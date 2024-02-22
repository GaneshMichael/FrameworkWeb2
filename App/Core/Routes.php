<?php

namespace App\Core;

use App\Controllers\UserController;
require_once __DIR__ . '/../../App/Core/Router.php';

$router = new Router();

$router->addRoute('/', UserController::class, 'index');

return $router;