<?php
$this->title = 'Card Database';
?>

<h1 class="text-center"><?= $this->title; ?></h1>

<p class="text-center">Bekijk hier alle kaarten</p>
<div class="row p-3">

</div>

<table class="table table-striped">
    <thead>
    <tr>

        <th>ID</th>
        <th>Naam</th>
        <th>Beschrijving</th>
        <th>Aanvalskracht</th>
        <th>Verdedigingskracht</th>
        <th>rarity</th>
        <th>type</th>
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