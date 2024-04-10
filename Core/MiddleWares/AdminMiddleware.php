<?php

namespace TCG\Core\MiddleWares;

use TCG\Core\Auth;
use TCG\Core\Exception\ForbiddenException;
use TCG\Core\Request;
use TCG\Core\Response;

class AdminMiddleware extends BaseMiddleware
{
    #[\Override] public function handle(Request $request, Response $response)
    {
        if (Auth::isGuest() || !Auth::isAdmin()) {
            // Gebruiker is niet ingelogd, doorverwijzen naar de inlogpagina
            throw new ForbiddenException();
        }

        // Voer de volgende middleware of controller actie uit
        return null;
    }
}