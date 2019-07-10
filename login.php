<?php
require "header.php";
?>
<div class="">
    <div class="row login">
        <div class="col-md-3 mx-auto">
            <div id="first">
                <div class="myform form ">
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1>Login</h1>
                        </div>
                    </div>

                    <form action="include/login.inc.php" method="post" name="login" id="login">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email_login" class="form-control" id="email_login" aria-describedby="emailHelp" placeholder="Inserisci la tua email">
                            <p class="text-danger email-error"></p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="password_login" id="password_login" class="form-control" aria-describedby="emailHelp" placeholder="Inserisci la tua password">
                            <p class="text-danger password-error"></p>

                        </div>

                        <div class="col-md-12 text-center " style="margin-top:50px">
                            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                        </div>
                        <h6 style="margin-top:10px">
                            <a href="registrati.php" class="link">Create Account</a>
                        </h6>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php

    require "footer.php";
    ?>