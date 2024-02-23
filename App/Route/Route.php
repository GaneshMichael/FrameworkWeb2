<?php

namespace TCG\Route;
use TCG\Http\ControllerInterface;
use TCG\Http\RouteInterface;

class Route implements RouteInterface
{
    private string $name;
    private string $method;
    private string $path;
    private ControllerInterface $controller;

    public function __construct(string $name, string $method, string $path, ControllerInterface $controller)
    {
        $this->name = $name;
        $this->method = $method;
        $this->path = $path;
        $this->controller = $controller;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function getController(): ControllerInterface
    {
        return $this->controller;
    }

    public function setController(ControllerInterface $controller): void
    {
        $this->controller = $controller;
    }
}