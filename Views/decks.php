<?php

use TCG\Core\Application;
use TCG\Core\Auth;

?>

<h1>Decks</h1>

<h2>Bekijk hier <?php $name = '';
    if (Application::$app->user) {
        $name = Application::$app->user->displayName();
        echo $name;
    } else {
        echo 'customized decks';
    } ?> </h2>