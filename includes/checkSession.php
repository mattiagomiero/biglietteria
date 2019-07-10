<?php
session_start();



$isLogged = false;

if (isset($_SESSION['uid'])) {
    $isLogged = true;
    $uid = $_SESSION['uid'];
    $nome = $_SESSION['nome'];
    $cognome = $_SESSION['cognome'];
}
