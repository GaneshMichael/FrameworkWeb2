<?php

namespace app\App\Core;

use app\App\Controllers\UserController;

$router = new Router();

$router->addRoute('/', UserController::class, 'index');
