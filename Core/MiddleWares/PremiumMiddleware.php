<?php

namespace TCG\Core\MiddleWares;

use TCG\Core\Auth;
use TCG\Core\Exception\ForbiddenException;
use TCG\Core\Request;
use TCG\Core\Response;

class PremiumMiddleware extends BaseMiddleware
{
    public function handle(Request $request, Response $response)
    {
        if (Auth::isGuest() || Auth::isFree()) {
            throw new ForbiddenException();
        }

        // Voer de volgende middleware of controller actie uit
        return null;
    }
}