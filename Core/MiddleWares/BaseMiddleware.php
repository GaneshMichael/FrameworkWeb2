<?php

namespace TCG\Core\MiddleWares;

use TCG\Core\Request;
use TCG\Core\Response;

abstract class BaseMiddleware
{
    // base for Handling an incoming request.
    abstract public function handle(Request $request, Response $response);
}