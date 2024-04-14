<?php
$this->title = 'Card Database';
?>

<h1 class="text-center"><?= $this->title; ?></h1>

<p class="text-center">Bekijk hier alle kaarten</p>
<div class="row p-3">

</div>

<form method="get" action="">
    <!-- Filter voor kaartnaam -->
    <label for="name">Kaartnaam:</label>
    <input type="text" id="name" name="name">

    <!-- Filter voor zeldzaamheid (rarity) -->
    <label for="rarity">Zeldzaamheid:</label>
    <select id="rarity" name="rarity">
        <option value="">Alle</option>
        <option value="Common">Common</option>
        <option value="Uncommon">Uncommon</option>
        <option value="Rare">Rare</option>
        <option value="Legendary">Legendary</option>
    </select>

    <!-- Filter voor kaarttype -->
    <label for="type">Kaarttype:</label>
    <select id="type" name="type">
        <option value="">Alle</option>
        <option value="Human">Human</option>
        <option value="Demon">Demon</option>
        <option value="Monster">Monster</option>
        <option value="Beast">Beast</option>
        <option value="Dragon">Dragon</option>
        <option value="Spirit">Spirit</option>
    </select>

    <!-- Filterknop -->
    <button type="submit">Filteren</button>
</form>

<!-- Weergave van kaarten -->
<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Naam</th>
        <th>Beschrijving</th>
        <th>Aanvalskracht</th>
        <th>Verdedigingskracht</th>
        <th>Zeldzaamheid</th>
        <th>Type</th>
        <th>Set</th>
        <th>Marktwaarde</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($cards as $card) : ?>
        <tr>
            <td><?= $card->id ?></td>
            <td><?= $card->name ?></td>
            <td><?= $card->description ?></td>
            <td><?= $card->power ?></td>
            <td><?= $card->defense ?></td>
            <td><?= $card->rarity ?></td>
            <td><?= $card->type ?></td>
            <td><?= $card->cardSet ?></td>
            <td><?= $card->marketValue ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
