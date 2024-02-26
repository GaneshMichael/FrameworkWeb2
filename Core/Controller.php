<?php

namespace TCG\Core;

class Controller
{
    public string $layout = 'base';
    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

}