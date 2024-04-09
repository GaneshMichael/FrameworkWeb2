<?php

namespace TCG\Controllers;

use TCG\Core\Application;
use TCG\Core\Controller;

class CardController extends Controller
{
    public function index()
    {
        $this->view->title = 'Decks';
        if (Application::$app->user) {
            $this->view->render('cardDatabase', [], 'auth');
        } else {
            $this->view->render('cardDatabase', [], 'base');
        }
    }
}