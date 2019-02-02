
<h2>ID <?= $equipes['id'] ?></h2>
<h2> Nom de l'équipe <?= $equipes['name'] ?></h2>



<p><b>Liste des Joueurs :</b></p>
<?php foreach ($joueurs as $joueur) { ?>
    <tr>
        <td><?php echo $joueur['name']; ?></td>
        <br/>
    </tr>
<?php } ?>
