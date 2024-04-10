<?php
use TCG\Core\Application;
use TCG\Core\Auth;

$app = Application::$app;
$user = $app->user;
$session = $app->session;

$currentUrl = $_SERVER['REQUEST_URI'];
?>

<?php if (Auth::isPremium()) :?>
    <h2>Stel je deck samen</h2>
<?php elseif (Auth::isAdmin()) : ?>
    <h2>Stel je deck samen</h2>
<?php else :?>
    <h2>Dit is een premium feature</h2>
<?php endif; ?>