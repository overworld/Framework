<form method="post">
    <div class="form-group">
        <label for="name">Nom :</label>
        <input type="text" class="form-control" name="name" value="<?php if (isset($equipes)) { echo $equipes['name']; } ?>">
    </div>
    <input type="submit" class="btn btn-primary" value="Enregistrer">
</form>