<?php

$wods = $baza->vratiTreninge();
/** @var Wod $wod */
foreach ($wods as $wod){

?>

<div class="col-md-4">
    <h2><?= $wod->getWodName() ?></h2>
    <h5><?= $wod->getType()->getTypeName() ?></h5>
    <p><?= $wod->getWodDesc() ?></p>
    <h5><?= $wod->getDifficulty() ?></h5>
    <?php
    if(!empty($_SESSION['user'])){
        ?>
    <a class="btn btn-info" href="unesiVreme.php?id=<?= $wod->getWodID() ?>&wodName=<?= $wod->getWodName() ?>">Unesi svoje vreme za <?= $wod->getWodName() ?></a>
        <?php
    }
    ?>
</div>

<?php
}
?>