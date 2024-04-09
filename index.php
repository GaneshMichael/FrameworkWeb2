<?php

use TCG\Core\Application;
use TCG\Core\Request;
use TCG\Core\Router;
use TCG\Core\Response;
use TCG\Core\Session;
use TCG\Models\UserModel;

require_once __DIR__ . '/vendor/autoload.php';

$request = new Request();
$response = new Response();
$router = new Router();
$session = new Session();

$user = null;
$primaryValue = $session->getSessionUser();
if ($primaryValue) {
    $userInstance = new UserModel();
    $primaryKey = $userInstance->primaryKey();
    $user = UserModel::findOne([$primaryKey => $primaryValue]);
}

$app = new Application($router, $request, $response, $session, $user);

require_once __DIR__ . '/Routes/Routes.php';

$app->run();