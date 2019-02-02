<h2>Liste des équipes</h2>
<table class="table">
    <thead>
    <tr>
        <th>Nom</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($joueurs as $player) { ?>
        <tr>
            <td><?php echo $player['name']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
