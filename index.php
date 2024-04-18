<?php require('actions/dbconnect.php') ?>
<?php require('fragments/session_control.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require('fragments/head_content.php') ?>
    </head>
    <body>
        <?php require('fragments/header.php') ?>

        <div class="px-4 py-5 my-5 text-center">
            <!-- *********** SOURCE: https://www.svgrepo.com/svg/521821/running *************** -->
            <img class="d-block mx-auto mb-4" src="img/running-man.svg" alt="" width="148" height="148">
            <h1 class="display-5 fw-bold">Speedrun Website</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4"> View Speedruns, upload yours, and have them reviewed here!</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="register.php"> 
                        <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Register</button>
                    </a>
                    
                    <a href="browse_games.php"> 
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Browse</button>
                    </a>
                </div>
            </div>
        </div>
        <?php print_r($_SESSION) ?>
        <?php require('fragments/footer.php') ?>
    </body>
</html>
