<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require('../vendor/autoload.php');

if (isset($_POST['playerOne']) && isset($_POST['playerTwo']) && isset($_POST['scorePlayerOne']) && isset($_POST['scorePlayerTwo'])) {

     if ($_POST['playerOne'] != $_POST['playerTwo']) {
         $newMatch = new Match($_POST['playerOne'], $_POST['playerTwo'], $_POST['scorePlayerOne'], $_POST['scorePlayerTwo']);
         $statement = PDOFactory::createPDO()->prepare("
          INSERT INTO games(joueurUn, joueurDeux, scoreJoueurUn, scoreJoueurDeux, winner)
          VALUES(:joueurUn, :joueurDeux, :scoreJoueurUn, :scoreJoueurDeux, :winner)
         ");

         $statement->execute(array(
             'joueurUn' => $newMatch->playerOne,
             'joueurDeux' => $newMatch->playerTwo,
             'scoreJoueurUn' => $newMatch->scorePlayerOne,
             'scoreJoueurDeux' => $newMatch->scorePlayerTwo,
             'winner' => $newMatch->winner
         ));
     }
}

header("Location: ../index.php");
