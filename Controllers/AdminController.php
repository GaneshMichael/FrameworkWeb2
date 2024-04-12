<?php

namespace TCG\Controllers;

use Exception;
use TCG\Core\Application;
use TCG\Core\Auth;
use TCG\Core\Request;
use TCG\Core\Response;
use TCG\Models\CardModel;
use TCG\Models\UserModel;
use TCG\Core\Controller;

class AdminController extends Controller
{
    
    public function dashboard()
    {
        $this->view->title = 'beheerderspagina';
        $this->view->render('Admin/AdminDashboard', [], 'auth');
    }

    public function userIndex()
    {
        $users = UserModel::findAllObjects();
        $this->view->title = 'Beheerderspaneel';
        $this->view->render('Admin/users', [
            'users' => $users
        ], 'auth');
    }

    public function editUser(Request $request, Response $response)
    {
    $id = $request->getQueryParams()['id'];
    $user = UserModel::findOne(['id' => $id]);

    if (!Auth::isAdmin()) {
        $response->redirect('Admin/users');
    }

    if ($user === null) {
        $exception = new Exception("Gebruiker niet gevonden.");
        $this->view->render('/_error', [], $exception);
        return;
    }

    $this->view->title = 'Admin';
    $this->view->render('Admin/EditUsers', [
        'model' => $user,
    ], 'auth');
    }

    public function updateUser(Request $request, Response $response)
    {
        $id = $request->getQueryParams()['id'] ?? null;
        if ($id === null) {
            echo "id is null";
            return;
        }

        $user = UserModel::findOne(['id' => $id]);

        if ($user === null) {
            $exception = new Exception("Gebruiker niet gevonden.");
            $this->view->render('/_error', ['exception' => $exception]);
            return;
        }

        $user->scenario = 'update';
        $user->loadData($request->getBody());
        if ($user->validate()) {
            echo "Validatie geslaagd";
        } else {
            var_dump($user->errors);
        }

        if ($user->validate() && $user->update()) {
            Application::$app->session->setFlash('success', 'Gebruiker succesvol bijgewerkt.');
            $response->redirect('/admin/users');
        } else {
            Application::$app->session->setFlash('error', 'Kon de gebruiker niet bijwerken.');
            $exception = new Exception("Kon de gebruiker niet bijwerken.");
            $this->view->render('/_error', ['exception' => $exception]);
        }
    }

    public function deleteUser(Request $request, Response $response)
    {
        $id = $request->getBody()['id'] ?? null;
        if (!$id) {
            throw new Exception("ID is verplicht");
        }

        $userModel = new UserModel();
        $user = $userModel->findOne(['id' => $id]);
        if ($user && $user->delete()) {
            Application::$app->session->setFlash('success', 'Gebruiker succesvol verwijderd.');
        } else {
            Application::$app->session->setFlash('error', 'Kon de gebruiker niet verwijderen.');
        }

        $response->redirect('/admin/users');
    }


    public function cardIndex()
    {
        $cards = CardModel::findAllObjects();
        $this->view->title = 'kaarten';
        $this->view->render('Admin/cards', [
            'cards' => $cards
        ], 'auth');
    }

    public function addCards(Request $request, Response $response)
    {
        $this->view->title = 'Kaart toevoegen';
        $this->view->render('Admin/addCard', [], 'auth');
    }

    public function registerCard(Request $request, Response $response)
    {
        $card = new CardModel();
        $card->loadData($request->getBody());

        if ($request->isPost()) {
            $isValidationSuccessful = $card->validate();

            if ($isValidationSuccessful && $card->register()) {
                Application::$app->session->setFlash('success', 'Kaart succesvol toegevoegd.');
                return $response->redirect('/cardDatabase');
            } else {
                Application::$app->session->setFlash('error', 'Er is een fout opgetreden. Probeer het opnieuw.');
            }
        }
    }

    public function deleteCard(Request $request, Response $response)
    {
        $id = $request->getBody()['id'] ?? null;
        if (!$id) {
            throw new Exception("ID is verplicht");
        }

        $cardModel = new CardModel();
        $card = $cardModel->findOne(['id' => $id]);
        if ($card && $card->delete()) {
            Application::$app->session->setFlash('success', 'Gebruiker succesvol verwijderd.');
        } else {
            Application::$app->session->setFlash('error', 'Kon de gebruiker niet verwijderen.');
        }

        $response->redirect('/admin/cards');
    }
}