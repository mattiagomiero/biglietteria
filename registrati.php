<?php
require "header.php";
?>

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-6 spazio-register">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form name="my-form" action="includes/registrati.inc.php" method="post">

                            <div class="form-group row">
                                <label for="full_name" class="col-md-4 col-form-label text-md-right">Nome</label>
                                <div class="col-md-6">
                                    <input type="text" id="nome" class="form-control" name="nome">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Cognome</label>
                                <div class="col-md-6">
                                    <input type="text" id="cognome" class="form-control" name="cognome">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_name" class="col-md-4 col-form-label text-md-right">E-mail</label>
                                <div class="col-md-6">
                                    <input type="text" id="email" class="form-control" name="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="present_address" class="col-md-4 col-form-label text-md-right">Ripeti Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="rip_password" name="rip_password" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="sumbit" name="signup-sumbit" class="btn btn-primary">
                                    Registrati
                                </button>
                            </div>
                            <h6>
                                <a href="login.php" class="link">Già registrato</a>
                            </h6>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>

<?php
require "footer.php";
?>