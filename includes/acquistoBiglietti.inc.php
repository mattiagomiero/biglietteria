<?php
require 'db.inc.php';
include 'checkSession.php';
header('Content-Type: application/json');


$uid = $_SESSION['uid'];
$fid = $_POST['id_film_acquisto'];
$nome = $_POST['nome'];
$cognome   = $_POST['cognome'];
$email   = $_POST['mail'];
$num_biglietti = $_POST['numbiglietti'];

$risposta = [
    'error' => false,
    'success' => false
];

if (empty($nome)) {
    $risposta['error'] = 101;
} else if (empty($cognome)) {
    $risposta['error'] = 102;
} else if (empty($email)) {
    $risposta['error'] = 103;
} else if (empty($num_biglietti)) {
    $risposta['error'] = 104;
} else {
    $risposta['success'] = true;


    $sql = "INSERT INTO biglietti_acquistati (id_film,id_utente,numero_biglietti) VALUES ('$fid','$uid','$num_biglietti')";
    $result = $conn->query($sql);
}
echo json_encode($risposta);
