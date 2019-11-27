<?php
require('vendor/autoload.php');

$reponse = PDOFactory::createPDO()->query("SELECT * FROM teams");
$reponseBDD = $reponse->fetchAll();
?>

    <div class="row" style="display: flex; ">
        <select class="col-md-2" name="teamOne" >
            <?php
            foreach ($reponseBDD as $teamBdd) {
                $team = new Team($teamBdd['id'], $teamBdd['teamName'], $teamBdd['joueurUn'], $teamBdd['joueurDeux']);
                ?>

                <option value="<?= $team->id ?>"><?= $team->teamName?> = <?= $team->joueurUn?>, <?= $team->joueurDeux?></option>

                <?php
            }
            ?>
        </select>
        <select name="scoreTeamOne" class="col-md-2 id="">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <p class="col-md-2">VS</p>
        <select class="col-md-2" name="teamTwo" >
            <?php
            foreach ($reponseBDD as $teamBdd) {
                $team = new Team($teamBdd['id'], $teamBdd['teamName'], $teamBdd['joueurUn'], $teamBdd['joueurDeux']);
                ?>

                <option value="<?= $team->id ?>"><?= $team->teamName?>  = <?= $team->joueurUn?>, <?= $team->joueurDeux?></option>

                <?php
            }
            ?>
        </select>
        </select>
        <select name="scoreTeamTwo" class="col-md-2 id="">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
    </div>
