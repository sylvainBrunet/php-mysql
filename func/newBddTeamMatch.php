<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require('../vendor/autoload.php');

if (isset($_POST['teamOne']) && isset($_POST['teamTwo']) && isset($_POST['scoreTeamOne']) && isset($_POST['scoreTeamTwo'])) {

     if ($_POST['teamOne'] != $_POST['teamTwo']) {
         $newTeamMatch = new TeamMatch($_POST['teamOne'], $_POST['teamTwo'], $_POST['scoreTeamOne'], $_POST['scoreTeamTwo']);
         $statement = PDOFactory::createPDO()->prepare("
          INSERT INTO teamgames(equipeUne, equipeDeux, scoreEquipeUne, scoreEquipeDeux, teamWinner)
          VALUES(:equipeUne, :equipeDeux, :scoreEquipeUne, :scoreEquipeDeux, :teamWinner)
         ");

         $statement->execute(array(
             'equipeUne' => $newTeamMatch->teamOne,
             'equipeDeux' => $newTeamMatch->teamTwo,
             'scoreEquipeUne' => $newTeamMatch->scoreTeamOne,
             'scoreEquipeDeux' => $newTeamMatch->scoreTeamTwo,
             'teamWinner' => $newTeamMatch->teamWinner
         ));
     }
}

header("Location: ../index.php");
