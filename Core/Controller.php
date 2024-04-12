<?php

namespace TCG\Core;

use TCG\Core\MiddleWares\BaseMiddleware;

class Controller
{
    protected array $middlewares = [];
    protected ?View $view = null;

    public function __construct()
    {
        $this->view = new View();
    }

    // Get the registered middlewares.
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }

    // Register a middleware for the controller.
    public function registerMiddleware(BaseMiddleware $middleware): void
    {
        $this->middlewares[] = $middleware;
    }

    // Redirect the user to the specified URL.
    protected function redirect(string $url)
    {
        header('Location: ' . $url);
        exit;
    }

}