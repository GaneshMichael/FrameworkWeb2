<?php

/** @var $model \TCG\models\UserModel
 */

use TCG\core\Application;
use TCG\Core\Auth;
use TCG\Models\UserModel;

$session = Application::$app->session;
$model = new UserModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model->loadData($_POST);

    if ($model->validate() && $model->register()) {
        $session->setFlash('success', 'Account created successfully.');
        return $this->redirect('/dashboard');
    } else {
        $session->setFlash('error', 'Er is een fout opgetreden. Probeer het opnieuw.');
    }
}
?>
<h1>Nieuwe gebruiker aanmaken</h1>
<!-- create register form -->
<form method="POST">
    <div class="form-group">
        <label for="firstName">Voornaam</label>
        <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $model->firstName; ?>" required>
    </div>
    <div class="form-group">
        <label for="lastName">Achternaam</label>
        <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $model->lastName ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Emailadres</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $model->email ?>" required>
    </div>
    <div class="form-group">
        <label for="password">Wachtwoord</label>
        <input type="password" class="form-control" id="password" name="password" value="<?= $model->password ?>" required>
    </div>
    <div class="form-group">
        <label for="confirmPassword">Wachtwoord bevestigen</label>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="<?= $model->confirmPassword ?>" required>
    </div>
    <div class="form-group">
        <label for="role">Rol</label>
        <select class="form-control" required id="role" name="role">
            <option value="Free" <?= $model->role === 'Free' ? 'selected' : '' ?>>Free</option>
            <option value="Premium" <?= $model->role === 'Premium' ? 'selected' : '' ?>>Premium</option>
            <option value="Beheerder" <?= $model->role === 'Beheerder' ? 'selected' : '' ?>>Beheerder</option>
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Aanmaken</button>
</form>