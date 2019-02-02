<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Frontend</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
        body {
            min-height: 2000px;
        }

        .navbar-static-top {
            margin-bottom: 19px;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">EXAM</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/">Accueil</a></li>
                <?php if ($user->isAuthenticated()) { ?>
                    <li><a href="/admin/equipes">Liste des equipes</a></li>
                    <li><a href="/admin/equipes/ajouter">Ajouter une equipe</a></li>
                    <li><a href="/admin/joueurs">Liste des joueurs</a></li>
                    <li><a href="/admin/joueurs/ajouter">Ajouter un joueur</a></li>
                <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (!$user->isAuthenticated()) { ?>
                    <li><a href="/login">Se connecter</a></li>
                <?php } else { ?>
                    <li><a href="/logout">Se déconnecter</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>
    <?php echo $content; ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>