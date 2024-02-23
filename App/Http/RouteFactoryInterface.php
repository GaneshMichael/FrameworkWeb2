<?php

namespace TCG\Http;


interface RouteFactoryInterface
{
    public function addRoute(string $name, string $method, string $path, ControllerInterface $controller): array;
}