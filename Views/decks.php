<?php
use TCG\Core\Application;
use TCG\Core\Auth;


$app = Application::$app;
$user = $app->user;
$session = $app->session;

$currentUrl = $_SERVER['REQUEST_URI'];
?>

<?php if (Auth::isPremium() || Auth::isAdmin()): ?>
    <h2 class="text-center">Stel je deck samen</h2>
    <a class="btn btn-primary" href="/decks/newDeck" role="button">Nieuw Deck Aanmaken</a>
<?php elseif(Auth::isFree()): ?>
    <h2 class="text-center">Het samenstellen van decks is een premium feature</h2>
    <h2 class="text-center">Upgrade naar premium om decks te kunnen samenstellen</h2>
    <a class="btn btn-primary" href="/premium" role="button">Upgrade</a>
<?php else: ?>

<?php endif; ?>

<h2 class="text-center">Alle decks</h2>

<table class="table">
    <thead>
    <tr>
        <th>Naam</th>
        <th>Kaarten</th>
        <th>Gebruiker</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($decks as $deck): ?>
        <tr>
            <td><?= $deck->name ?></td>
            <td>
                <?php $cardNames = $deck->getCardNames(); ?>
                <?php foreach ($cardNames as $cardName): ?>
                    <?= $cardName ?><br>
                <?php endforeach; ?>
            </td>
            <td><?= $deck->getUserName() ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


