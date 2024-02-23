<?php
namespace App\Core;

class Router {
    private array $routes = [];
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }


    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path];

        if ($callback === false) {
            return "Not found";
        }
//        if (is_string($callback)) {
//            return $this->renderVoew($view);
//        }
        call_user_func($callback);
    }
}