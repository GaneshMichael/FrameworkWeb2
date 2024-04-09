<?php

namespace TCG\Controllers;

use TCG\Core\Application;
use TCG\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->view->title = 'Home';
        if (Application::$app->user) {
            $this->view->render('home', [], 'auth');
        } else {
            $this->view->render('home', [], 'base');
        }
    }
}