<?php
namespace app\App\Core;

class Router {
    protected  $routes = [];

    public function addRoute($route, $handler) {
        $this->routes[$route] = $handler;
    }

    public function handleRequest($url) {
        foreach ($this->routes as $route => $handler) {
            if ($route === $url) {
                return $handler();
            }
        }

        return '404 - Page not found';
    }

}
