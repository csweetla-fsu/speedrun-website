<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php require('fragments/session_control.php') ?>
<html>
    <head>
        <?php require('fragments/head_content.php') ?>
    </head>
    <body>
        <?php require('fragments/header.php') ?>

        <!-- Container-->
        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <div class="row align-items-center g-lg-5 py-5">

                <!-- Login form-->
                <div class="col-md-10 mx-auto col-lg-5">
                    <form class="p-4 p-md-5 border rounded shadow bg-body-tertiary"  action="actions/login_action.php" method="post">
                        <h1 class="display-6 lh-1 text-body-emphasis mb-3">Login</h1>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="name@example.com">
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
                        <hr class="my-4">
                        <small class="text-body-secondary">Don't have an account yet? <a href="register.php"> register instead </a></small>
                    </form>
                    <!-- ERROR BOX -->
                    <?php
                    if (!empty($_SESSION["login_errors"])) {
                        echo '<div class="alert alert-danger mt-3 pt-3 pb-2">';
                        echo '<ul>';
                        foreach ($_SESSION["login_errors"] as $login_err) {
                            echo '<li>' . $login_err . '</li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                    }
                    ?>
                </div>

            </div>
        </div>

        <?php require('fragments/footer.php') ?>
    </body>
</html>
