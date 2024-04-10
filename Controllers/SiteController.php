<?php

namespace TCG\Controllers;
use TCG\Core\Application;
use TCG\Core\Controller;

class SiteController extends Controller
{
    public function contact(): void
    {
        $this->view->title = 'Contact us';
        if (Application::$app->user) {
            $this->view->render('contact', [], 'auth');
        } else {
            $this->view->render('contact');
        }
    }

    public function premium(): void
    {
        $this->view->title = 'Premium';
        if (Application::$app->user) {
            $this->view->render('GetPremium', [], 'auth');
        } else {
            $this->view->render('GetPremium');
        }
    }

}