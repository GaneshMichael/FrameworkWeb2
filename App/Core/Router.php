<?php
namespace TCG\Core;

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
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        call_user_func($callback);
    }

    public function renderView($view)
    {
        $layout = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);
        return str_replace('{{content}}', $viewContent, $layout);
    }

    public function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR .  "/../views/layouts/base.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view)
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/../views/$view.php";
        return ob_get_clean();
    }
}