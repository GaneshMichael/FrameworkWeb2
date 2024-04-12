<?php

namespace TCG\Core\MiddleWares;

use TCG\Core\Auth;
use TCG\Core\Exception\ForbiddenException;
use TCG\Core\Request;
use TCG\Core\Response;
use TCG\Models\Deck;

class PremiumMiddleware extends BaseMiddleware
{
    public function handle(Request $request, Response $response)
    {
        // Check if the user is a premium user
        if (Auth::isFree() or Auth::isGuest() ){
            // User is not a premium user, throw a ForbiddenException
            throw new ForbiddenException();
        }

        // If the request contains a deck id, check if the user owns the deck
        $deckId = $request->getQueryParams('id');
        if ($deckId) {
            $deck = Deck::find($deckId);
            if (!$deck || $deck->user_id !== Auth::user()->getId()) {
                // User is not the owner of the deck, redirect to an error page or show an error message
                $response->redirect('/error');
                return $response;
            }
        }

        // Proceed to the next middleware or controller action
        return null;
    }
}
