<?php

namespace TCG\Http\Server;

use TCG\Http\Message\ResponseInterface;
use TCG\Http\Message\ServerRequestInterface;
interface MiddleWareInterface
{
    /**
     * Process an incoming server request.
     *
     * Processes an incoming server request in order to produce a response.
     * If unable to produce the response itself, it may delegate to the provided
     * request handler to do so.
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface;
}