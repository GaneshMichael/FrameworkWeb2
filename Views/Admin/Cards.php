<?php
$this->title = 'Cards';
?>

<h1 class="text-center"><?= $this->title; ?></h1>

<div class="row p-3">
    <div class="col-12">
        <a href="/admin/cards/addCard" class="btn btn-primary">Nieuwe kaart toevoegen</a>
    </div>
</div>

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
        <th>Rarity</th>
        <th>Type</th>
        <th>Set</th>
        <th>Marktwaarde</th>
        <th>Acties</th> <!-- Toegevoegd voor de kolom met acties -->
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
            <td>
                <button class="btn btn-primary"><a style="color:white;" href="<?= '/admin/cards/edit?id=' . $card->id ?>">Wijzigen</a>
                </button>
                <form method="post" action="/admin/cards/delete">
                    <input type="hidden" name="id" value="<?= $card->id ?>">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Weet u zeker dat u deze kaart wilt verwijderen?')">Verwijderen</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
