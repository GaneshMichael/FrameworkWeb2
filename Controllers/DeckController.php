<?php

namespace TCG\Controllers;

use TCG\Core\Application;
use TCG\Core\Controller;
use TCG\Core\Request;
use TCG\Core\Response;
use TCG\Models\CardModel;
use TCG\Models\DeckModel;

class DeckController extends Controller
{
    public function index()
    {
        $decks = DeckModel::findAllObjects();
        $this->view->title = 'Decks';
        if (Application::$app->user) {
            $this->view->render('decks', ['decks' => $decks], 'auth');
        } else {
            $this->view->render('decks', ['decks' => $decks], 'base');
        }
    }

    public function newDeck()
    {
        $cards = CardModel::findAllObjects();
        $this->view->title = 'Nieuw Deck';
        $this->view->render('Premium/newDeck', ['cards' => $cards], 'auth');
    }
    public function create(Request $request, Response $response)
    {
        $deck = new DeckModel();
        $deck->loadData($request->getBody());
        $deck->user_id = Application::$app->user->id;

        $deck->cards = implode(',', $_POST['cards'] ?? []);

        $isValidationSuccessful = $deck->validate();

        if ($isValidationSuccessful && $deck->register()) {
            Application::$app->session->setFlash('success', 'Deck succesvol aangemaakt.');
            return $response->redirect('/decks');
        } else {
            Application::$app->session->setFlash('error', 'Er is een fout opgetreden. Probeer het opnieuw.');
        }
    }
}
