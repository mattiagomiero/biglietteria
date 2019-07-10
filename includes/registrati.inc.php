<?php
if (isset($_POST['signup-sumbit'])) {

    include 'db.inc.php';


    echo  $nome = $_POST['nome'];
    echo $cognome = $_POST['cognome'];
    echo $email = $_POST['email'];
    echo $password = $_POST['password'];
    echo  $password_repeat = $_POST['rip_password'];



    // Controllo i campi vuoti del form
    if (empty($nome) || empty($cognome) || empty($email) || empty($password) || empty($password_repeat)) {
        header("Location: ../registrati.php?error=emptyfields&name=" . $nome . "&email=" . $email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $nome)) {
        header("Location: ../registrati.php?error=invalid");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../registrati.php?error=invalidemail&name=" . $cognome);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $nome)) {
        header("Location: ../registrati.php?error=invaliduser&email=" . $email);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $cognome)) {
        header("Location: ../registrati.php?error=invaliduser&email=" . $email);
        exit();
    } else if ($password !== $password_repeat) {
        header("Location: ../registrati.php?error=passwordcheck&uid=" . $nome . "&email=" . $email);
        exit();
    } else {

        /* check connection */
        $sql_utente = "SELECT * FROM utenti WHERE nome='$nome'";
        $stmt = mysqli_prepare($conn, $sql_utente);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        $result = mysqli_stmt_num_rows($stmt);

        if ($result == 0) {
            $stmt = mysqli_prepare($conn, "INSERT INTO utenti (nome,cognome,email,password) VALUES (?,?,?,?)");




            mysqli_stmt_bind_param($stmt, 'ssss', $nome, $cognome, $email, $password);



            /* execute prepared statement */
            mysqli_stmt_execute($stmt);
            // printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stmt));
            /* close statement and connection */
            mysqli_stmt_close($stmt);
            /* close connection */
            mysqli_close($conn);
            header("Location: ../index.php?status=success");
        } else {
            header("Location: ../registrati.php?error=usernameexist");
        }
    }
} else {
    header("Location: ../registrati.php?error=connessione_db");
    exit();
}
