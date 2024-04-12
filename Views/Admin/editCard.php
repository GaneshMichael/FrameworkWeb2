<?php

use TCG\Core\Application;
use TCG\Models\CardModel;

$session = Application::$app->session;;

$id = $_GET['id'] ?? null;
if (!$id) {
    $session->setFlash('error', 'user ID not provided.');
    header('Location: /decks');
    exit;
}

$card = \TCG\Models\CardModel::findOne(['id' => $id]);
if (!$card) {
    $session->setFlash('error', 'User not found.');
    header('Location: /decks');
    exit;
}

?>

<h1>Kaart bewerken</h1>
<form method="POST" action="/admin/cards/update?id=<?= $id ?>">
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
    <button type="submit" class="btn btn-primary">Updaten</button>
</form>