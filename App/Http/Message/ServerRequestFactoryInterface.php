<?php

namespace TCG\Http\Message;

interface ServerRequestFactoryInterface
{
    public function createServerRequest(string $method, $uri, array $serverParams = []): ServerRequestInterface;
}