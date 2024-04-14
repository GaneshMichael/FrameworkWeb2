<?php

use TCG\Core\Application;
use TCG\Core\Auth;

?>

<h1>TCG: Anime Collectors</h1>
<p>Welkom bij TCG: Anime Collectors! Hier kun je je eigen decks maken en kaarten verzamelen.</p>
<?php if (Application::$app->user) : ?>
<p>Ga naar <a href="/decks">Decks</a> om  decks te bekijken. Als je een premium member bent kun je ook decks maken! </p>
<p>Ga naar <a href="/cardDatabase">Kaarten</a> om kaarten te bekijken. Er worden door beheerders steeds meer kaarten toegevoegd! </p>
<?php else : ?>
<p> <a href="/login">Log in</a> of <a href="/register">registreer</a> om te beginnen.</p>
<?php endif; ?>
<br>
<img src="assets/img/rimuru.jpeg" alt="rimuru">
<br>
<br>
<img src="assets/img/rimuru2.jpeg" alt="rimuru 2" >