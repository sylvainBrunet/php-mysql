<?php
require('vendor/autoload.php');

$reponse = PDOFactory::createPDO()->query("SELECT * FROM players");
$reponseBDD = $reponse->fetchAll();
?>


        <select class="col-md-4 center" name="playerOne" >
            <?php
            foreach ($reponseBDD as $playerBdd) {
                $player = new Player($playerBdd['id'], $playerBdd['pseudo'], $playerBdd['clashRoyalTag']);
                ?>
                <option value="<?= $player->pseudo ?>"><?= $player->pseudo?></option>
                <?php
            }
            ?>
        </select>


            <select class="col-md-4 center"  name="playerTwo" >
                <?php
                foreach ($reponseBDD as $playerBdd) {
                    $player = new Player($playerBdd['id'], $playerBdd['pseudo'], $playerBdd['clashRoyalTag']);
                    ?>
                    <option value="<?= $player->pseudo ?>"><?= $player->pseudo?></option>
                    <?php
                }
                ?>
            </select>
