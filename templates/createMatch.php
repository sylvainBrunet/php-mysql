<?php
require('vendor/autoload.php');

$reponse = PDOFactory::createPDO()->query("SELECT * FROM players");
$reponseBDD = $reponse->fetchAll();
?>

    <div class="row" style="display: flex; ">
        <select class="col-md-2" name="playerOne" >
            <?php
            foreach ($reponseBDD as $playerBdd) {
                $player = new Player($playerBdd['id'], $playerBdd['pseudo'], $playerBdd['clashRoyalTag']);
                ?>

                <option value="<?= $player->id ?>"><?= $player->pseudo?></option>

                <?php
            }
            ?>
        </select>
        <select name="scorePlayerOne" class="col-md-2 id="">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <p class="col-md-2">VS</p>
        <select class="col-md-2" name="playerTwo" >
            <?php
            foreach ($reponseBDD as $playerBdd) {
                $player = new Player($playerBdd['id'], $playerBdd['pseudo'], $playerBdd['clashRoyalTag']);
                ?>

                <option value="<?= $player->id ?>"><?= $player->pseudo?></option>

                <?php
            }
            ?>
        </select>
        </select>
        <select name="scorePlayerTwo" class="col-md-2 id="">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
    </div>
