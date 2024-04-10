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
        if (Application::$app->user) {
            $this->view->render('cardDatabase', [
                'cards' => $cards], 'auth');
        } else {
            $this->view->render('cardDatabase', [
                'cards' => $cards], 'base');
        }
    }
    public function createCard()
    {

    }
}