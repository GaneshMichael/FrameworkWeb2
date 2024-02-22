<?php
namespace App\Controllers;

use Models\User;

class UserController extends Controller
{
    public function index(): void
    {
        $users = [
            new User('John Doe', 'John@example.com'),
            new User('Jane Doe', 'John1@example.com'),
        ];

        $this->render('App\Views\user\index', ['users' => $users]);

    }

}