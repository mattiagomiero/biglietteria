<?php

$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "cinema";


$conn = mysqli_connect($servername, $db_username, $db_password, $db_name);
mysqli_set_charset($conn, "utf8");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
