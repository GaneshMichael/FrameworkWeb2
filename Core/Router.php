<?php

namespace TCG\Core;

class Router {
    protected array $routes = [];

    // Define a route for GET requests.
    public function get($path, $callback, $middleware = null): void
    {
        $this->routes['get'][$path] = [
            'callback' => $callback,
            'middleware' => $middleware,
        ];
    }

    // Define a route for POST requests.
    public function post($path, $callback, $middleware = null): void
    {
        $this->routes['post'][$path] = [
            'callback' => $callback,
            'middleware' => $middleware,
        ];
    }

    // Resolve the incoming request to the appropriate route.
    public function resolve(Request $request): void
    {
        $path = $request->getPath();
        $method = $request->method();
        $route = $this->routes[$method][$path] ?? null;

        if ($route === null) {
            if ($path === '/404') {
                $view = new View();
                if (Application::$app->user) {
                    echo $view->render('404', [], 'auth');
                } else {
                    echo $view->render('404', [], 'base');
                }
            } else {
                Application::$app->response->redirect('/404');
            }
            return;
        }

        $middlewares = $this->getMiddlewares($route['middleware']);
        $resolvedMiddlewares = $this->resolveMiddlewares($middlewares);

        $response = $this->executeMiddlewares($resolvedMiddlewares, $request, new Response());

        if ($response !== null) {
            $response->send();
            return;
        }

        $callback = $route['callback'];

        if ($callback instanceof \Closure) {
            $callback($request, new Response());
        } else {
            $controller = $callback[0];
            $method = $callback[1];

            if (is_string($controller)) {
                $controller = new $controller;
            }
            $controller->$method($request, new Response());
        }
    }

    // Get middlewares for the route.
    public function getMiddlewares($middleware): array
    {
        if (is_array($middleware)) {
            return $middleware;
        } elseif ($middleware !== null) {
            return [$middleware];
        }

        return [];
    }

    // Resolve middlewares to instances.
    private function resolveMiddlewares(array $middlewares): array
    {
        $resolvedMiddlewares = [];

        foreach ($middlewares as $middleware) {
            $resolvedMiddlewares[] = new $middleware();
        }

        return $resolvedMiddlewares;
    }

    // Execute the middlewares.
    public function executeMiddlewares(array $middlewares, Request $request, Response $response): ?Response
    {
        foreach ($middlewares as $middleware) {
            $response = $middleware->handle($request, $response);

            if ($response !== null) {
                return $response;
            }
        }

        return null;
    }
}