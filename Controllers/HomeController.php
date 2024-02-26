<?php

namespace TCG\Controllers;

use TCG\Core\Application;

class HomeController
{
    public function home()
    {
        $params = [
            'name' => "The Card Game",
        ];
        return Application::$app->router->renderView('home', $params);
    }
}