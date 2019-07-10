<?php
require 'db.inc.php';

$id_film = $_GET['id_film'];

$sql = "SELECT * FROM film WHERE id_film='$id_film'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$img = $row['img_film'];
$durata = $row['durata'];
$titolo = $row['titolo'];
$info_film = $row['info_film'];


?>


<div class="modal fade" id="info_film" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content info-cinema ">
            <button type="button" class="close" data-dismiss="modal" style="display: flex;justify-content: flex-end;">&times;</button>
            <h1>FILM: <?= $titolo ?></h1>
            <img src="img/<?= $img ?>" alt="cinemainfo" style="margin-bottom:40px">
            <h5>Descrizione:</h5>
            <p><?= $info_film ?></p>
            <p>Durata: <?= $durata ?></p>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>