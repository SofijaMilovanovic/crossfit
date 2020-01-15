<?php

$rezultati = $baza->vratiSveRezulate();
?>
<table class="table" id="rez">
    <thead>
    <tr>
        <th>WOD</th>
        <th>Korisnik</th>
        <th>Vreme</th>
        <th>Obrisi</th>
    </tr>
    </thead>
    <tbody>
<?php
foreach ($rezultati as $rez) {

    ?>
    <tr>
        <td><?= $rez->wod_name ?></td>
        <td><?= $rez->first_name . " ".$rez->last_name ?></td>
        <td><?= $rez->minutes . ":".$rez->seconds ?></td>
        <td><button class="btn btn-primary" onclick="obrisiRezultat(<?= $rez->user_time_id ?>)">Obrisi rezulat</button> </td>
    </tr>
    <?php
        }
    ?>
    </tbody>
</table>
