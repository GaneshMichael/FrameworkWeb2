<?php

namespace TCG\Controllers;

use TCG\Core\Application;
use TCG\Core\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "The Card Game",
        ];
        return Application::$app->router->renderView('home', $params);
    }
}