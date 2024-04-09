<?php

namespace TCG\Controllers;

use TCG\Core\Application;
use TCG\Core\Controller;

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
}