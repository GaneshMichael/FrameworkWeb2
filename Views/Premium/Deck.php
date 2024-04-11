<h1 class="text-center">Stel je deck samen</h1>

<p class="text-center">Selecteer hier je kaarten</p>

<form method="post" action="process_deck.php">
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
                        <?php $selected_count = isset($_POST['selected_cards'][$card->id]) ? count($_POST['selected_cards'][$card->id]) : 0; ?>
                        <div>
                            <button type="button" class="btn btn-sm btn-primary" onclick="decreaseQuantity(<?= $card->id ?>)">-</button>
                            <span id="quantity<?= $card->id ?>"><?= $selected_count ?></span>
                            <button type="button" class="btn btn-sm btn-primary" onclick="increaseQuantity(<?= $card->id ?>)">+</button>
                            keer geselecteerd
                            <input type="hidden" name="selected_cards[<?= $card->id ?>]" id="selectedCards<?= $card->id ?>" value="<?= $selected_count ?>">
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <button type="submit" class="btn btn-primary">Deck samenstellen</button>
</form>

<script>
    function increaseQuantity(cardId) {
        var quantityElement = document.getElementById('quantity' + cardId);
        var currentQuantity = parseInt(quantityElement.textContent);
        quantityElement.textContent = currentQuantity + 1;
        document.getElementById('selectedCards' + cardId).value = currentQuantity + 1;
    }

    function decreaseQuantity(cardId) {
        var quantityElement = document.getElementById('quantity' + cardId);
        var currentQuantity = parseInt(quantityElement.textContent);
        if (currentQuantity > 0) {
            quantityElement.textContent = currentQuantity - 1;
            document.getElementById('selectedCards' + cardId).value = currentQuantity - 1;
        }
    }
</script>
