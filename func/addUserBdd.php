<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require(__DIR__.'/../vendor/autoload.php');

if (isset($_POST['pseudo']) && isset($_POST['tag'])) {
    $newUser = new Player(0, $_POST['pseudo'], $_POST['tag']);

    $req = PDOFactory::createPDO()->prepare("INSERT INTO players(pseudo, clashRoyalTag) VALUES(:pseudo, :tag) ");
    $req->execute(array(
        'pseudo'=> $newUser->pseudo,
        'tag'=> $newUser->clashRoyalTag
    ));
}

header("Location: ../index.php");