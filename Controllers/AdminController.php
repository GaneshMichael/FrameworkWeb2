<?php

namespace TCG\Controllers;

use TCG\Models\UserModel;
use TCG\Core\Controller;

class AdminController extends Controller
{

    public function index()
    {
        $users = UserModel::findAllObjects();
        $this->view->title = 'Beheerderspaneel';
        $this->view->render('Admin/Index', [
            'users' => $users
        ], 'auth');
    }
}