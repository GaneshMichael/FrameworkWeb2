<?php

namespace TCG\Controllers;

use TCG\Core\Application;
use TCG\Core\Controller;
use TCG\Models\CardModel;

class CardController extends Controller
{
    // Renders the card database page.
    public function index()
    {
        // Ontvang filterparameters
        $nameFilter = $_GET['name'] ?? null; //
        $rarityFilter = $_GET['rarity'] ?? null;
        $typeFilter = $_GET['type'] ?? null;

        // Roep de methode aan om kaarten op te halen met filterparameters
        $cards = CardModel::findAllObjects($nameFilter, $rarityFilter, $typeFilter);

        // Render de weergave met de gefilterde kaarten
        $this->view->title = 'Card database';
        $this->view->render('cardDatabase', ['cards' => $cards]);
    }

}