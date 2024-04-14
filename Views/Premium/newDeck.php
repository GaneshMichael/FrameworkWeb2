<?php

/** @var $model \TCG\Models\DeckModel
 */

use TCG\core\Application;
use TCG\Models\DeckModel;

$session = Application::$app->session;
$model = new DeckModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model->loadData($_POST);

    if ($model->validate() && $model->register()) {
        $session->setFlash('success', 'Deck succesvol aangemaakt.');
        return $this->redirect('/decks');
    } else {
        $session->setFlash('error', 'Er is een fout opgetreden. Probeer het opnieuw.');
    }
}

$user_id = Application::$app->user->id;
?>


<h1 class="text-center">Stel je deck samen</h1>

<form method="post">
    <!-- Voeg een veld toe voor de naam van het deck -->
    <div class="form-group">
        <label for="name">Naam</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= isset($model->name) ? $model->name : ''; ?>" required>
    </div>

    <p class="text-center">Selecteer hier je kaarten</p>

    <div class="row p-3">
        <?php foreach ($cards as $card) : ?>
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?= $card->name ?></h5>
                        <p class="card-text"><?= $card->description ?></p>
                        <p class="card-text">Aanvalskracht: <?= $card->power ?></p>
                        <p class="card-text">Verdedigingskracht: <?= $card->defense ?></p>
                        <p class="card-text">Rarity: <?= $card->rarity ?></p>
                        <p class="card-text">Type: <?= $card->type ?></p>
                        <p class="card-text">Set: <?= $card->cardSet ?></p>
                        <p class="card-text">Marktwaarde: <?= $card->marketValue ?></p>
                        <input type="checkbox" name="cards[]" value="<?= $card->id ?>"> Voeg toe aan deck
                        <br>
                        <input type="checkbox" name="cards[]" value="<?= $card->id ?>"> Voeg toe aan deck
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <button type="submit" class="btn btn-primary">Deck samenstellen</button>
</form>

<script>
    function changeQuantity(cardId, isChecked) {
        var cardInput = document.querySelector('input[name="cards[]"][value="' + cardId + '"]');
        cardInput.checked = isChecked;
    }

    document.addEventListener("DOMContentLoaded", function() {
        var form = document.querySelector('form');
        var checkboxes = document.querySelectorAll('input[name="cards[]"]');
        var selectedCount = 0;

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    selectedCount++;
                } else {
                    selectedCount--;
                }

                if (selectedCount > 15) {
                    alert("Je kunt maximaal 15 kaarten selecteren.");
                    this.checked = false;
                    selectedCount--;
                }
            });
        });

        form.addEventListener('submit', function(event) {
            if (selectedCount > 15) {
                alert("Je kunt maximaal 15 kaarten selecteren.");
                event.preventDefault(); // Voorkom formulier verzending
            }
        });
    });

</script>
