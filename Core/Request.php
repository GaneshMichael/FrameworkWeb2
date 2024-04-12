<?php

namespace TCG\Core;

class Request
{
    // Get the path of the request.
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    // Get the request method.
    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    // Check if the request method is GET.
    public function isGet(): bool
    {
        return $this->method() === 'get';
    }

    // Check if the request method is POST.
    public function isPost(): bool
    {
        return $this->method() === 'post';
    }

    // Get the request body.
    public function getBody()
    {
        $body = [];

        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->method() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }

    // Get the query parameters of the request.
    public function getQueryParams(): array
    {
        return $_GET;
    }

    // Get the request URI.
    public function getUri()
    {
        return $_SERVER['REQUEST_URI'];
    }




}