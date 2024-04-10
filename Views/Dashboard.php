<?php

use TCG\Core\Application;

?>

<h1>Home</h1>
<h2>Welkom <?php $name = '';
    if (Application::$app->user) {
        $name = Application::$app->user->displayName();
        echo $name;
    } ?> bij uw persoonlijke dashboard</h2>

