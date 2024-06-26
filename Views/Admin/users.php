<?php
$this->title = 'Alle gebruikers';
?>

<h1 class="text-center"><?= $this->title; ?></h1>

<div class="row p-3">

</div>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Actie</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= $user->email ?></td>
            <td><?= $user->role ?></td>
            <td><button class="btn btn-primary"><a style="color:white;" href="<?= '/admin/users/edit?id=' . $user->id ?>">Wijzigen</a></button>
                <form method="post" action="/admin/users/delete">
                    <input type="hidden" name="id" value="<?= $user->id ?>">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Weet u zeker dat u deze gebruiker wilt verwijderen?')">Verwijderen</button>
                </form>
            </td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>