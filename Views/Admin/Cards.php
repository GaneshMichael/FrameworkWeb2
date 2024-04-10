<?php
$this->title = 'Cards';
?>

<h1 class="text-center"><?= $this->title; ?></h1>

<p class="text-center">Bekijk hier alle kaarten</p>
<div class="row p-3">

</div>

<table>
    <thead>
    <tr>
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
            <td><?= $card->name ?></td>
            <td><?= $card->description ?></td>
            <td><?= $card->power ?></td>
            <td><?= $card->defense ?></td>
            <td><?= $card->rarity ?></td>
            <td><?= $card->type ?></td>
            <td><?= $card->cardSet ?></td>
            <td><?= $card->marketValue ?></td>
            <td>
                <form method="post" action="/admin/cards/delete">
                    <input type="hidden" name="id" value="<?= $card->id ?>">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Weet u zeker dat u deze kaart wilt verwijderen?')">Verwijderen</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>