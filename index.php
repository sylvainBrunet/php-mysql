<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Classement clash royale</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<style>
    @font-face {
        font-family: 'Supercell-Magic';
        src: url("assets/Supercell-magic-webfont.ttf");
    }
    h1 {
        font-family: Supercell-Magic;
    }
    .display-3 {
        font-size: 3rem;
    }
    .col-md-2 {
        margin-left: 4px;
        margin-right: 4px;
        text-align: center;
    }
    .col-md-2,
    .col-md-4 {
        /*border-radius: 5px;*/
    }
    .center {
        text-align: center;
    }
    .button_container a {
        background: #4397ed;
        border: 2px rgba(255, 255, 255, 0.6) solid;
        color: white;
        border-radius: 6px;
        padding: 3px 8px;
        text-decoration: none;
        transition: 300ms;
        margin: 15px;
    }
    .button_container a:hover {
        background: rgba(67, 151, 237, 0.7);
    }
    .jumbotron {
        margin: 0;
    }
    .jumbotron_background {
        background-image: url('assets/background.jpg');
        background-size: cover;
    }
    .classement__item {
        background: rgba(255, 255, 255, 0.7);
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
    .classement__item p {
        margin: 0;
    }
</style>
    <main role="main">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3 center" style="margin-bottom: 30px"><img style="height: 70px; width: auto;" src="assets/logo_clash_royal.png" alt="Logo Clahs Royal"> Clash Royale</h1>
                <form class="center" action="func/newBddMatch.php" method="post">
                    <div class="row">
                        <p class="col-md-2">Joueur numéro Un</p>
                        <p class="col-md-2"> Score</p>
                        <p class="col-md-2"></p>
                        <p class="col-md-2">Joueur numéro Deux</p>
                        <p class="col-md-2"> Score</p>
                    </div>
                    <?php require (__DIR__.'/templates/createMatch.php'); ?>
                    <div class="row" style="margin-top: 15px">
                        <p class="col-md-2"></p>
                        <p class="col-md-2"></p>
                        <input class="col-md-2" style="background: #4397ed; border: 2px rgba(255, 255, 255, 0.6) solid; color: white; border-radius: 6px;" type="submit" value="Créer">
                        <p class="col-md-2"></p>
                        <p class="col-md-2"></p>
                    </div>
                </form>
            </div>
            <div class="container">
                <h1 class="display-3 center" style="margin-bottom: 30px"><img style="height: 70px; width: auto;" src="assets/logo_clash_royal.png" alt="Logo Clahs Royal"> Clash Royale 2 vs 2</h1>
                <form class="center" action="func/newBddTeamMatch.php" method="post">
                    <div class="row">
                        <p class="col-md-2">Team numéro Un</p>
                        <p class="col-md-2"> Score</p>
                        <p class="col-md-2"></p>
                        <p class="col-md-2">Team numéro Deux</p>
                        <p class="col-md-2"> Score</p>
                    </div>
                    <?php require (__DIR__.'/templates/createTeamMatch.php'); ?>
                    <div class="row" style="margin-top: 15px">
                        <p class="col-md-2"></p>
                        <p class="col-md-2"></p>
                        <input class="col-md-2" style="background: #4397ed; border: 2px rgba(255, 255, 255, 0.6) solid; color: white; border-radius: 6px;" type="submit" value="Créer">
                        <p class="col-md-2"></p>
                        <p class="col-md-2"></p>
                    </div>
                </form>
            </div>
        </div>
        <div class="classement jumbotron center jumbotron_background" style="margin: auto">
            <div class="container">
                <h1 class="classement__title display-3" style=" margin-bottom: 45px">Classement des joueurs</h1>
                <div class="button_container" style="display: none">
                    <a href="index.php?sort=trophy">Trier par trophés</a>
                    <a href="index.php?sort=victory">Trier par victoires</a>
                </div>
                <div class="classement__container">
                    <?php require (__DIR__.'/templates/classementTemplate.php'); ?>
                </div>
            </div>
        </div>
        <div class="classement jumbotron center jumbotron_background" style="margin: auto">
            <div class="container">
                <h1 class="classement__title display-3" style=" margin-bottom: 45px">Classement des Equipes</h1>
                <div class="button_container" style="display: none">
                    <a href="index.php?sort=trophy">Trier par trophés</a>
                    <a href="index.php?sort=victory">Trier par victoires</a>
                </div>
                <div class="classement__container">
                    <?php require (__DIR__.'/templates/classementTemplateTeam.php'); ?>
                </div>
            </div>
        </div>
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3 center">Créer un Joueur</h1>
                <form class="center" action="func/addUserBdd.php" method="post">
                    <div class="row">
                        <input type="text" required name="pseudo" placeholder="Entrez le pseudo" class="col-md-4 center">
                        <input type="text" required name="tag" placeholder="Entrez le tag Clash Royal" class="col-md-4 center">
                        <input type="submit" value="Ajouter" class="col-md-4 center">
                    </div>
                </form>
            </div>
        </div>
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3 center">Créer une team</h1>
                <form class="center" action="func/addTeamBdd.php" method="post">
                    <div class="row">
                        <input type="text" required name="teamName" placeholder="Entrez le nom de la team" class="col-md-4 center">
                        <?php require (__DIR__.'/templates/ChoosePlayer.php'); ?>
                        <input type="submit" value="Ajouter" class="col-md-4 center">
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer class="container">
        <p class="center" style="font-family: Supercell-Magic; margin: 10px 0">&copy;HogRiders 2018</p>
    </footer>
</body>
</html>
