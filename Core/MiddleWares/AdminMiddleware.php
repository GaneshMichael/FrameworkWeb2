<?php

namespace TCG\Core\MiddleWares;

use TCG\Core\Auth;
use TCG\Core\Exception\ForbiddenException;
use TCG\Core\Request;
use TCG\Core\Response;

class AdminMiddleware extends BaseMiddleware
{
    public function handle(Request $request, Response $response)
    {
        if (!Auth::isAdmin()) {
            // User is not an admin, throw a ForbiddenException
            throw new ForbiddenException();
        }

        // Proceed to the next middleware or controller action
        return null;
    }
}