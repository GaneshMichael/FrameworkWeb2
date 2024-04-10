<?php

namespace TCG\Controllers;

use TCG\Core\Application;
use TCG\Core\Controller;
use TCG\Models\CardModel;

class CardController extends Controller
{
    public function index()
    {
        $cards = CardModel::findAllObjects();
        $this->view->title = 'Card database';
        $this->view->render('cardDatabase', [
            'cards' => $cards
        ], 'auth');
    }

    public function createCard()
    {

    }
}