<?php

namespace TCG\Controllers;
use TCG\Core\Application;
use TCG\Core\Controller;
use TCG\Core\Request;

class SiteController extends Controller
{
    public function contact()
    {
        $this->view->title = 'Contact us';
        if (Application::$app->user) {
            $this->view->render('contact', [], 'auth');
        } else {
            $this->view->render('contact', [], 'base');
        }
    }

    public function premium()
    {
        $this->view->title = 'Premium';
        if (Application::$app->user) {
            $this->view->render('GetPremium', [], 'auth');
        } else {
            $this->view->render('GetPremium', [], 'base');
        }
    }

}