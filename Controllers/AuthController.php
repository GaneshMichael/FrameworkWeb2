<?php

namespace TCG\Controllers;

use TCG\Core\Controller;
use TCG\Core\Request;
use TCG\Models\RegisterModel;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();

        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->register()) {
                return 'Success';
            }

            return $this->render('register', [
                'model' => $registerModel
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }

    public function login()
    {
        return $this->render('login');
    }

}