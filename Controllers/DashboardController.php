<?php

namespace TCG\Controllers;

use TCG\Core\Auth;
use TCG\Core\Controller;
use TCG\Core\MiddleWares\AuthMiddleware;

class DashboardController extends Controller
{
    protected Auth $auth;

    public function __construct()
    {
        $this->auth = new Auth();
        parent::__construct();
        $this->registerMiddleware(new AuthMiddleware());
    }

    // Renders the dashboard page.
    public function index()
    {
        $this->view->title = 'Dashboard';
        $this->view->render('dashboard', [], 'auth');
    }
}