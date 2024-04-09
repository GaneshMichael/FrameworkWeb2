<?php

use TCG\Core\Application;
use TCG\Core\Auth;

?>

<h1>Home</h1>
<h2>Welkom <?php $name = '';
            if (Application::$app->user) {
            $name = Application::$app->user->displayName();
            echo $name;
            } else {
                echo 'bij TCG collectors game';
            } ?> </h2>
<?php //if (Auth::isGuest()) : ?>
<!--    <button class="btn btn-sm btn-success" onclick="window.location.href='/login'">Login</button>-->
<!--    <button class="btn btn-sm btn-primary" onclick="window.location.href='/register'">Register</button>-->
<?php //endif; ?>
