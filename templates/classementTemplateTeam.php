<?php
require (__DIR__.'/../vendor/autoload.php');
$reponse = PDOFactory::createPDO()->query("SELECT * FROM teams");
$teams = $reponse->fetchAll();

$classement = 1;

$teamsWithScore = [];
foreach ($teams as $teamBdd) {
    $reqteam = PDOFactory::createPDO()->query("SELECT COUNT(*) FROM teamgames WHERE teamWinner = '". $teamBdd['id'] ."'");
    $teamScore = $reqteam->fetch();

    $teamsWithScore[] = new Team($teamBdd['id'], $teamBdd['teamName'], $teamBdd['joueurUn'], $teamBdd['joueurDeux'], $teamScore[0]);
}

usort($teamsWithScore, function (team $varA, team $varB) {
    return $varB->score <=> $varA->score;
});

/*if (isset($_POST['sort']) && $_POST['sort'] === "trophy") {
    usort($playersWithScore, function (Player $varA, Player $varB) {
        return $varB->getClashRoyalInfo()->trophies <=> $varA->getClashRoyalInfo()->trophies;
    });
} else {
    usort($playersWithScore, function (Player $varA, Player $varB) {
        return $varB->score <=> $varA->score;
    });
}*/

foreach ($teamsWithScore as $team) {
    ?>
    <div class="row classement__item" style="width: 80%; margin: 10px auto; padding: 4px 0; border-radius: 6px; text-align: center">
        <p style="text-align: center; flex: 1 0 20%" >#<?= $classement ?></p>
        <p style="text-align: center; flex: 1 0 20%" ><?= $team->teamName ?></p>
        <p style="text-align: center; flex: 1 0 20%" ><?= $team->score ?> Victoires</p>
        <p style="text-align: center; flex: 1 0 20%" ><?= $team->joueurUn ?></p>
        <p style="text-align: center; flex: 1 0 20%" ><?= $team->joueurDeux ?></p>

    </div>
<?php
    $classement++;
}
?>
