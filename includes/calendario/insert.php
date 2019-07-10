<?php
require '../db.inc.php';


$titolo_evento = $_POST['title'];
$inizio_evento = $_POST['start'];
$fine_evento = $_POST['end'];

if (isset($_POST['title'])) {
    $sql = "INSERT INTO eventi (titolo_evento, inizio_evento, fine_evento) VALUES ('$titolo_evento', '$inizio_evento', '$fine_evento')";
    $statement = $conn->prepare($sql);
    $statement->execute();
}
