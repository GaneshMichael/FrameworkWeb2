<?php

namespace TCG\Controllers;

use TCG\Core\Application;
use TCG\Core\Controller;
use TCG\Models\CardModel;

class DeckController extends Controller
{
    public function index()
    {
        $this->view->title = 'Decks';
        if (Application::$app->user) {
            $this->view->render('decks', [], 'auth');
        } else {
            $this->view->render('decks', [], 'base');
        }
    }

    public function deck1()
    {
        $cards = CardModel::findAllObjects();
        $this->view->title = 'Deck 1';
        if (Application::$app->user) {
            $this->view->render('Premium/Deck', [
                'cards' => $cards], 'auth');
        } else {
            $this->view->render('deck1', [], 'base');
        }
    }

    public function deck2()
    {
        $cards = CardModel::findAllObjects();
        $this->view->title = 'Deck 2';
        if (Application::$app->user) {
            $this->view->render('Premium/Deck', [
                'cards' => $cards], 'auth');
        } else {
            $this->view->render('deck2', [], 'base');
        }
    }

    public function deck3()
    {
        $cards = CardModel::findAllObjects();
        $this->view->title = 'Deck 3';
        if (Application::$app->user) {
            $this->view->render('Premium/Deck', [
                'cards' => $cards
            ], 'auth');
        } else {
            $this->view->render('deck3', [], 'base');
        }
    }
}