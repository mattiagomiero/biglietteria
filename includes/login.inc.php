<?php

require 'db.inc.php';
header('Content-Type: application/json'); // converte le ripsoste come json 

$risposta = [
    'error' => false,
    'success' => false
    // 'query' => $sql
];

$email = $_POST['email_login'];
$password = $_POST['password_login'];


if (empty($email) || empty($password)) {
    header("Location: ../login.php?error=emptyfields");
} else {

    $sql = "SELECT * FROM utenti WHERE email='$email' ";
    // $risposta['query'] = $sql;


    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $uid = $row['id'];
    $nome = $row['nome'];
    $cognome = $row['cognome'];
    $ispresent = count($row);



    if ($ispresent  == 0) {
        $risposta['error'] = 202;
    } else {

        if ($password === $row['password']) {
            setSessionLogin($uid, $nome, $cognome);
            $risposta['success'] = true;
        } else {
            $risposta['error'] = 203;
        }
    }
}



function setSessionLogin($uid, $nome, $cognome)
{
    session_start();
    $_SESSION['uid'] = $uid;
    $_SESSION['nome'] = $nome;
    $_SESSION['cognome'] = $cognome;
}

echo json_encode($risposta); //devo per forza metterlo per per passargli i dati al success alla chiamata ajax
