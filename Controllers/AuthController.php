<?php

namespace TCG\Controllers;

use TCG\Core\Application;
use TCG\Core\Auth;
use TCG\Core\Controller;
use TCG\Core\MiddleWares\AuthMiddleware;
use TCG\Core\Request;
use TCG\Core\Response;
use TCG\Core\View;
use TCG\Models\LoginModel;
use TCG\Models\UserModel;

class AuthController extends Controller
{
    protected Auth $auth;

    public function __construct()
    {
        $this->auth = new Auth();
        parent::__construct();
        $this->registerMiddleware(new AuthMiddleware());
    }

    // Renders the login page and handles user login.
    public function login(Request $request): View
    {
        $loginModel = new LoginModel();
        $errorMessage = '';

        if ($request->isPost()) {
            $loginModel->loadData($request->getBody());

            if ($loginModel->validate() && $loginModel->login()) {
                Application::$app->session->setFlash('success', 'Succesvol ingelogd.');
                return $this->redirect('/');
            } else {
                $errorMessage = 'Ongeldige inloggegevens. Probeer het opnieuw.';
            }
        }

        $this->view->title = 'Inloggen';
        $this->view->render('login', [
            'model' => $loginModel,
            'errorMessage' => $errorMessage,
        ]);

        return $this->view;
    }

    // Handles user registration.
    public function register(Request $request, Response $response)
    {
        $user = new UserModel();
        $user->scenario = 'register';
        $user->loadData($request->getBody());

        if ($request->isPost()) {
            $isValidationSuccessful = $user->validate();

            if ($isValidationSuccessful && $user->register()) {
                Application::$app->session->setFlash('success', 'Account succesvol aangemaakt.');
                return $response->redirect('/dashboard');
            } else {
                Application::$app->session->setFlash('error', 'Er is een fout opgetreden. Probeer het opnieuw.');
            }
        }
        if (Application::$app->user) {
            return $this->view->render('register', [
                'model' => $user
            ], 'auth');
        } else {
            return $this->view->render('register', [
                'model' => $user
            ], 'base');
        }
    }

    // Logs out the user.
    public function logout()
    {
        Application::$app->user = null;
        Application::$app->session->remove('user');
        return $this->redirect('/login');
    }
}