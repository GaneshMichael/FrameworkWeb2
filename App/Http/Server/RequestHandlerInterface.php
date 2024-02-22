<?php

namespace TCG\Http\Server;

use TCG\Http\Message\ResponseInterface;
use TCG\Http\Message\ServerRequestInterface;
interface RequestHandlerInterface
{
    /**
     * Handles a request and produces a response.
     *
     * May call other collaborating code to generate the response.
     */
    public function handle(ServerRequestInterface $request): ResponseInterface;
}