<?php

$request = $_SERVER['REQUEST_URI'];
$viewDir = '/App/views/';

switch ($request) {
    case '':
    case '/':
        require __DIR__ . $viewDir . 'home.php';
        break;

    case '/users':
        require __DIR__ . $viewDir . 'users.php';
        break;

    case '/contact':
        require __DIR__ . $viewDir . 'contact.php';
        break;

    case '/cardDatabase':
        require __DIR__ . $viewDir . 'cardDatabase.php';
        break;

    case '/decks':
        require __DIR__ . $viewDir . 'decks.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}