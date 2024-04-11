<?php
use TCG\Core\Application;
use TCG\Core\Auth;

$app = Application::$app;
$user = $app->user;
$session = $app->session;

$currentUrl = $_SERVER['REQUEST_URI'];
?>

<?php if (Auth::isPremium()):?>
    <h2>Stel je deck samen</h2>
    <a class="btn btn-primary" href="/decks/deck1" role="button">Deck 1</a>
    <a class="btn btn-primary" href="/decks/deck2" role="button">Deck 2</a>
    <a class="btn btn-primary" href="/decks/deck3" role="button">Deck 3</a>
<?php elseif (Auth::isAdmin()) :?>
    <h2>Stel je deck samen</h2>
    <a class="btn btn-primary" href="/decks/deck1" role="button">Deck 1</a>
    <a class="btn btn-primary" href="/decks/deck2" role="button">Deck 2</a>
    <a class="btn btn-primary" href="/decks/deck3" role="button">Deck 3</a>
<?php else :?>
    <h2>Het samenstellen van decks is een premium feature</h2>
    <h2>Upgrade naar premium om decks te kunnen samenstellen</h2>
    <a class="btn btn-primary" href="/premium" role="button">Upgrade</a>
<?php endif; ?>