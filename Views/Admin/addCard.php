<?php

use TCG\Core\Application;
use TCG\Models\CardModel;

$session = Application::$app->session;
$model = new CardModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$model->loadData($_POST);

if ($model->validate() && $model->register()) {
$session->setFlash('success', 'card created successfully.');
return $this->redirect('/admin');
} else {
$session->setFlash('error', 'Er is een fout opgetreden. Probeer het opnieuw.');
}
}
?>

<h1>Nieuwe kaart aanmaken</h1>
<form method="POST">
    <div class="form-group">
        <label for="name">Naam</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $model->name; ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Beschrijving</label>
        <input type="text" class="form-control" id="description" name="description" value="<?= $model->description ?>" required>
    </div>
    <div class="form-group">
        <label for="power">Aanvalskracht</label>
        <input type="number" class="form-control" id="power" name="power" value="<?= $model->power ?>" required>
    </div>
    <div class="form-group">
        <label for="defense">Verdedigingskracht</label>
        <input type="number" class="form-control" id="defense" name="defense" value="<?= $model->defense ?>" required>
    </div>
    <div class="form-group">
        <label for="rarity">Zeldzaamheid</label>
        <input type="text" class="form-control" id="rarity" name="rarity" value="<?= $model->rarity ?>" required>
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" class="form-control" id="type" name="type" value="<?= $model->type ?>" required>
    </div>
    <div class="form-group">
        <label for="cardSet">cardSet</label>
        <input type="text" class="form-control" id="cardSet" name="cardSet" value="<?= $model->cardSet ?>" required>
    </div>
    <div class="form-group">
        <label for="marketValue">Marktwaarde</label>
        <input type="number" class="form-control" id="marketValue" name="marketValue" value="<?= $model->marketValue ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Aanmaken</button>
</form>