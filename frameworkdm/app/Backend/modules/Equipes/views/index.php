<h2>Liste des équipes</h2>
<table class="table">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Supprimer</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($equipes as $team) { ?>
        <tr>
            <td><?php echo $team['name']; ?></td>
            <td><a href="/admin/equipes-<?php echo $team['id']; ?>/supprimer">Supprimer</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

