<?php
require "header.php";
require 'includes/db.inc.php';

?>

<main>
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->

                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/cinema1.jpg" alt="First slide">
                </div>

                <!-- Slide Two - Set the background image for this slide in the line below -->

                <div class="carousel-item">
                    <img class="d-block w-100" src="img/cinema2.jpg" alt="Second slide">
                </div>

                <!-- Slide Three - Set the background image for this slide in the line below -->

                <div class="carousel-item">
                    <img class="d-block w-100" src="img/cinema3.jpg" alt="Third slide">
                </div>
            </div>
        </div>
    </header>



    <!-- //////////////////////////////////////////////// TITOLI DI FILM //////////////////////////////////////// -->
    <div class="container">

        <h1 class="my-4">Benvenuto! I titoli del momento:</h1>
        <div class="row">
            <?php
            $sql_titoli = "SELECT * FROM film";
            $result = $conn->query($sql_titoli);
            while ($row = $result->fetch_assoc()) {
                $idfilm = $row['id_film'];
                $titolo = $row['titolo'];
                $descrizione = $row['descrizione'];
                $durata = $row['durata'];
                $posti_disponibili = $row['posti_disponibili'];
                $img_film = $row['img_film'];



                $sql_biglietti_presi = "SELECT SUM(numero_biglietti) as numero_biglietti FROM biglietti_acquistati WHERE id_film='$idfilm'";
                $result_biglietti = $conn->query($sql_biglietti_presi);
                $row_biglietti = $result_biglietti->fetch_assoc();
                $nbiglietti = $row_biglietti['numero_biglietti'];

                $posti_disponibili;
                $nbiglietti;
                $post_disponibili = $posti_disponibili - $nbiglietti;
                ?>

                <br> <br>


                <div class="col-md-4  portfolio-item">
                    <div class="card h-100">
                        <a onclick="mostraInfoFilm(<?= $idfilm ?>)" class="manina">
                            <img class="card-img-top" src="img/<?= $img_film ?>" alt="">
                        </a>

                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#"><?= $titolo ?></a>
                            </h4>
                            <p class="card-text"><?= $descrizione ?></p>
                            <h6>Durata: <?= $durata ?> minuti.</h6>
                            <h6>Posti disponibili: <?= $post_disponibili ?> </h6>
                        </div>
                        <?php if ($isLogged) { ?>
                            <button onclick="showModalBiglietti('<?= $idfilm ?>')" class="btn_acquista">Acquista</button>
                        <?php } else { ?>
                            <p style="text-align:center; color:green">Per l'acquisto del biglietto devi loggarti</p>

                        <?php } ?>

                    </div>
                </div>
            <?php
            } ?>
















            <!-- *********************************** MODAL WINDOWS ****************************** -->

            <div class="prova">
                <div class="prova2">
                    <button type="button" class="close" id="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>


                    <h3>Ciao <?= $nome ?>, stai acquistando i biglietti per il film:</h3>

                    <div class="">
                        <img src="img/film1.jpg" class="img_acquisto" id="img_acquisto" alt="img">
                    </div>

                    <div class="biglietti">
                        <h5>Inserisci i dati per l'acquisto</h5>
                        <form class="form" method="post" action="includes/acquistoBiglietti.inc.php" id="acquistoBiglietti">
                            <input type="text" class="form-control biglietti-form" placeholder="Nome" name="nome">
                            <p class="text-danger mancato-error nome-error"></p>
                            <input type="text" class="form-control biglietti-form" placeholder="Cognome" name="cognome">
                            <p class="text-danger mancato-error cognome-error"></p>
                            <input type="text" class="form-control biglietti-form" placeholder="E-mail" name="mail">
                            <p class="text-danger mancato-error mail-error"></p>
                            <input type="hidden" name="id_film_acquisto" id="id_film_acquisto" value="">
                            <select name="numbiglietti" id="numbiglietti" class="custom-select form-control biglietti-form">

                                <option value="0" selected>Seleziona il numero di biglietti</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            <p class="text-danger mancato-error nbiglietti-error"></p>
                            <button type="submit" class="button biglietti-form">Acquista</button>
                        </form>
                    </div>
                </div>
            </div>


            <div id="info_modal_film"></div>


            <script>
                function showModalBiglietti(idfilm) {
                    acquistoBiglietto(idfilm);
                    document.querySelector(".prova").style.display = "flex";
                }

                document.querySelector('#close').addEventListener("click", function() {
                    document.querySelector(".prova").style.display = "none";
                })

                function acquistoBiglietto(idfilm) {
                    var xhr = new XMLHttpRequest;
                    xhr.open('GET', 'includes/acquisto.php?id_film=' + idfilm, true);
                    xhr.send();
                    xhr.onload = function() {
                        var response = JSON.parse(this.responseText) //converte una stringa in json 
                        document.getElementById('img_acquisto').src = 'img/' + response.img_film;
                        document.getElementById('id_film_acquisto').value = response.id_film;
                    }

                }
            </script>

</main>

<?php
require "footer.php";
?>