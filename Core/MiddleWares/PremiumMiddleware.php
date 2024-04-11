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
        // Controleer of de gebruiker premium is
        if (Auth::isFree() or Auth::isGuest() ){
            // Gebruiker is geen premiumgebruiker, foutmelding tonen
            throw new ForbiddenException();
        }

//         Als het verzoek een deck-id bevat, controleer dan of de gebruiker de eigenaar is van het deck
        $deckId = $request->getQueryParams('id');
        if ($deckId) {
            $deck = Deck::find($deckId);
            if (!$deck || $deck->user_id !== Auth::user()->getId()) {
                // Gebruiker is geen eigenaar van het deck, doorverwijzen naar een foutpagina of een foutmelding tonen
                $response->redirect('/error');
                return $response;
            }
        }

        // Voer de volgende middleware of controller actie uit
        return null;
    }
}
