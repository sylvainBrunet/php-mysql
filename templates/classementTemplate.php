<?php
require (__DIR__.'/../vendor/autoload.php');
$reponse = PDOFactory::createPDO()->query("SELECT * FROM players");
$players = $reponse->fetchAll();

$classement = 1;

$playersWithScore = [];
foreach ($players as $playerBdd) {
    $reqPlayer = PDOFactory::createPDO()->query("SELECT COUNT(*) FROM games WHERE winner = '". $playerBdd['id'] ."'");
    $playerScore = $reqPlayer->fetch();

    $playersWithScore[] = new Player($playerBdd['id'], $playerBdd['pseudo'], $playerBdd['clashRoyalTag'], $playerScore[0]);
}

usort($playersWithScore, function (Player $varA, Player $varB) {
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

foreach ($playersWithScore as $player) {
    $playerInfoApi = $player->getClashRoyalInfo();

?>
    <div class="row classement__item" style="width: 80%; margin: 10px auto; padding: 4px 0; border-radius: 6px; text-align: center">
        <p style="text-align: center; flex: 1 0 20%" >#<?= $classement ?></p>
        <p style="text-align: center; flex: 1 0 20%" ><?= $player->pseudo ?></p>
        <p style="text-align: center; flex: 1 0 20%" ><?= $player->score ?> Victoires</p>
        <p style="text-align: center; flex: 1 0 20%" ><?= $playerInfoApi->trophies ?>
            <img style="height: 25px; width: auto;" src="assets/trophy.png" alt="Trophy logo">
        </p>
        <p style="flex: 1 0 20%"><img style="height: 35px; width: auto;" src="assets/arenas/<?= $playerInfoApi->arena->arenaID ?>.png" alt="Logo arena"></p>
    </div>
<?php
    $classement++;
}
?>
