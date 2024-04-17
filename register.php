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

                <!-- Text-->
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Sign up now to upload your runs!</h1>
                    <p class="col-lg-10 fs-4">
                        With an account, you can upload your own speedruns to our website and have them verified, as well as help with verification of other runs.  
                    </p>
                </div>

                <!-- Sign up form-->
                <div class="col-md-10 mx-auto col-lg-5">
                    <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary shadow" action="actions/register_action.php" method="post">
                        <h1 class="display-6 lh-1 text-body-emphasis mb-3">Register</h1>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="name@example.com">
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Password">
                            <label for="confirm_password">Confirm Password</label>
                        </div>
                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
                        <hr class="my-4">
                        <small class="text-body-secondary">Already have an account? <a href="login.php"> login instead </a></small>
                    </form>
                    <!-- Sending errors from registration -->
                    <?php
                    if (!empty($_SESSION["registration"]["errors"])) {
                        echo '<div class="alert alert-danger mt-3 pt-3 pb-2">';
                        echo '<ul>';
                        foreach ($_SESSION["registration"]["errors"] as $reg_err) {
                            echo '<li>' . $reg_err . '</li>';
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
