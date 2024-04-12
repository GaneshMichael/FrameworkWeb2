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

    // Renders the admin dashboard
    public function dashboard()
    {
        $this->view->title = 'beheerderspagina';
        $this->view->render('Admin/AdminDashboard', [], 'auth');
    }

    // Renders admin user index
    public function userIndex()
    {
        $users = UserModel::findAllObjects();
        $this->view->title = 'Beheerderspaneel';
        $this->view->render('Admin/users', [
            'users' => $users
        ], 'auth');
    }

    // Renders the user editing page
    public function editUser(Request $request, Response $response)
    {
    $id = $request->getQueryParams()['id'];
    $user = UserModel::findOne(['id' => $id]);

    if (!Auth::isAdmin()) {
        $response->redirect('Admin/users');
    }

    if ($user === null) {
        $exception = new Exception("Gebruiker niet gevonden.");
        $this->view->render('404', [], $exception);
        return;
    }

    $this->view->title = 'Admin';
    $this->view->render('Admin/EditUsers', [
        'model' => $user,
    ], 'auth');
    }

    // Updates the user information
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
            $this->view->render('404', ['exception' => $exception]);
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
            $this->view->render('404', ['exception' => $exception]);
        }
    }

    // Deletes a user
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


    // Renders the page for card management
    public function cardIndex()
    {
        $cards = CardModel::findAllObjects();
        $this->view->title = 'kaarten';
        $this->view->render('Admin/cards', [
            'cards' => $cards
        ], 'auth');
    }

    // Renders the page for adding a new card
    public function addCards(Request $request, Response $response)
    {
        $this->view->title = 'Kaart toevoegen';
        $this->view->render('Admin/addCard', [], 'auth');
    }

    // Registers a new card
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

    // Delete a card
    public function deleteCard(Request $request, Response $response)
    {
        $id = $request->getBody()['id'] ?? null;
        if (!$id) {
            throw new Exception("ID is verplicht");
        }

        $cardModel = new CardModel();
        $card = $cardModel->findOne(['id' => $id]);
        if ($card && $card->delete()) {
            Application::$app->session->setFlash('success', 'Kaart succesvol verwijderd.');
        } else {
            Application::$app->session->setFlash('error', 'Kon de Kaart niet verwijderen.');
        }

        $response->redirect('/admin/cards');
    }



// Renders the page for editing a card
    public function editCard(Request $request, Response $response)
    {
        $id = $request->getQueryParams()['id'];
        $card = CardModel::findOne(['id' => $id]);

        // Controleren of de gebruiker een beheerder is
        if (!Auth::isAdmin()) {
            $response->redirect('/home');
            return;
        }

        // Controleren of de kaart gevonden is
        if ($card === null) {
            $exception = new Exception("Kaart niet gevonden.");
            $this->view->render('404', [], $exception);
            return;
        }

        // Paginatitel instellen
        $this->view->title = 'Bewerk kaart';
        // De bewerkingspagina voor kaarten weergeven met de kaartgegevens
        $this->view->render('Admin/editCard', [
            'model' => $card,
        ], 'auth');
    }

// Updates the card information
    public function updateCard(Request $request, Response $response): void
    {
        $id = $request->getQueryParams()['id'] ?? null;
        if ($id === null) {
            echo "id is null";
            return;
        }

        $card = CardModel::findOne(['id' => $id]);

        if ($card === null) {
            $exception = new Exception("Kaart niet gevonden.");
            $this->view->render('404', ['exception' => $exception]);
            return;
        }

        // Laad de gegevens van het verzoek in het model
        $card->loadData($request->getBody());

        // Voer validatie uit
        $isValid = $card->validate();

        if ($isValid && $card->update()) {
            // Succesvol bijgewerkt, stel flashbericht in en leid de gebruiker om
            Application::$app->session->setFlash('success', 'Kaart succesvol bijgewerkt.');
            $response->redirect('/admin/cards');
            return;
        }

        // Als validatie of bijwerking mislukt, stel een foutbericht in en render opnieuw de bewerkingspagina met de fouten
        Application::$app->session->setFlash('error', 'Kon de kaart niet bijwerken.');
        $this->view->render('Admin/editCard', [
            'model' => $card,
            'errors' => $card->errors // Dit is handig voor het weergeven van fouten op de pagina
        ], 'auth');
    }

}