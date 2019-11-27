<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require(__DIR__.'/../vendor/autoload.php');

if (isset($_POST['teamName']) && isset($_POST['playerOne']) && isset($_POST['playerTwo'])) {
    $newTeam = new Team(0, $_POST['teamName'], $_POST['playerOne'], $_POST['playerTwo']);

    $req = PDOFactory::createPDO()->prepare("INSERT INTO teams(teamName, joueurUn, joueurDeux) VALUES(:teamName, :playerOne, :playerTwo) ");
    $req->execute(array(
        'teamName'=> $newTeam->teamName,
        'playerOne' => $newTeam->joueurUn,
        'playerTwo' => $newTeam->joueurDeux
    ));
}

header("Location: ../index.php");
