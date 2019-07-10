<?php

require 'db.inc.php';
header('Content-Type: application/json');
$id_film = $_GET['id_film'];
$id_film;
$sql = "SELECT * FROM film WHERE id_film='$id_film'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


echo json_encode($row); //converte il mio array in json 
