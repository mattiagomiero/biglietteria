<?php
include 'includes/checkSession.php';
if (!$isLogged) { } else { }
include 'finestre_modal/info_cinema.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Il cinema di Mazzi che è pieno di intrallazzi
    </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <link href="https://fonts.googleapis.com/css?family=Handlee&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2f48c8f305.js"></script>

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Cinema</a>
            <a data-toggle="modal" data-target="#descrizione_cinema" class="navbar-brand" href="index.php">Info</a>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <?php if (!$isLogged) { ?>

                        <li class="nav-item">
                            <a class="nav-link" href="registrati.php">Registrati</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>


                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Benvenuto <?= $nome . " " . $cognome ?></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="calendario.php">Calendario</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="includes/logout.inc.php">Logout</a>
                        </li>


                    <?php
                    } ?>

                </ul>
            </div>
        </div>
    </nav>