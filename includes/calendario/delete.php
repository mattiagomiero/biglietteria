<?php
require '../db.inc.php';
$id_eventi = $_POST['id'];

if (isset($_POST["id"])) {
    echo $sql = "DELETE FROM eventi WHERE id_eventi='$id_eventi'";
    $statement = $conn->prepare($sql);
    $statement->execute();
}
