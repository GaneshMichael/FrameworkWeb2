<?php
namespace app\App\Controllers;

use app\App\Core\Controller;
use app\App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = [
            new User('John Doe', 'John@example.com'),
            new User('Jane Doe', 'John1@example.com'),
        ];

        $this->render('user/index', ['users' => $users]);

    }

}