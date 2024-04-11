<?php
use TCG\Core\Application;
use TCG\Core\Auth;

$app = Application::$app;
$user = $app->user;
$session = $app->session;

$currentUrl = $_SERVER['REQUEST_URI'];
?>

<?php if (Auth::isPremium() || Auth::isAdmin()): ?>
    <h2>Stel je deck samen</h2>
    <a class="btn btn-primary" href="/decks/newDeck" role="button">Nieuw Deck Aanmaken</a>
<?php else: ?>
    <h2>Het samenstellen van decks is een premium feature</h2>
    <h2>Upgrade naar premium om decks te kunnen samenstellen</h2>
    <a class="btn btn-primary" href="/premium" role="button">Upgrade</a>
<?php endif; ?>
