<?php

namespace TCG\Core\MiddleWares;

use TCG\Core\Request;
use TCG\Core\Response;

abstract class BaseMiddleware
{
    abstract public function handle(Request $request, Response $response);
}