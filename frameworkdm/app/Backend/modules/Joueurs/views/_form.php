<form method="post">
    <div class="form-group">
        <label for="name">Nom :</label>
        <input type="text" class="form-control" name="name" value="<?php if (isset($joueurs)) { echo $joueurs['name']; } ?>">
        <label for="name">Id de l'équipe à laquelle vous voulez affecter le joueur :</label>
        <input type="text" class="form-control" name="idEquipe" value="<?php if (isset($joueurs)) { echo $joueurs['idEquipe']; } ?>">
    </div>
    <input type="submit" class="btn btn-primary" value="Enregistrer">
</form>