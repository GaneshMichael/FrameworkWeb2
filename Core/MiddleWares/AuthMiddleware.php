<?php

namespace TCG\Core\MiddleWares;

use TCG\Core\Auth;
use TCG\Core\Request;
use TCG\Core\Response;

class AuthMiddleware extends BaseMiddleware
{

    public function handle(Request $request, Response $response)
    {
        // Handle an incoming request.

        if (Auth::isGuest()) {
            // User is not logged in, redirect to the login page
            $response->redirect('/login');
            return $response;
        }

        // Proceed to the next middleware or controller action
        return null;
    }
}