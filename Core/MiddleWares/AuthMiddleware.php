<?php

namespace TCG\Core\MiddleWares;

use TCG\Core\Auth;
use TCG\Core\Request;
use TCG\Core\Response;

class AuthMiddleware extends BaseMiddleware
{

    public function handle(Request $request, Response $response)
    {
        // TODO: Implement handle() method.
        if (Auth::isGuest()) {
            // Gebruiker is niet ingelogd, doorverwijzen naar de inlogpagina
            $response->redirect('/login');
            return $response;
        }

        // Voer de volgende middleware of controller actie uit
        return null;
    }
}