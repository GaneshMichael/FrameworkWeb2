<?php
namespace app\App\Core;

class Router {
    protected  $routes = [];

    public function addRoute($route, $controller, $action) {
        $this->routes[$route] = [
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function handleRequest($url) {
        if (array_key_exists($url, $this->routes)) {
            $controller = $this->routes[$url]['controller'];
            $action = $this->routes[$url]['action'];

            $controller = new $controller();
            $controller->$action();

        } else {
            throw new \Exception("No route found for URI: $url");
        }
    }

}
