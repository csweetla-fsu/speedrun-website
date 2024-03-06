<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Speedrun Website</title>
        <link rel="stylesheet" href="styles/main.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <header class="p-3 text-bg-dark">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                    <!-- ******* SOURCE: https://www.svgrepo.com/svg/509121/game-controller **********-->        
                    <a href="/" class="d-flex align-items-center mx-4 mb-2 mb-lg-0 text-white text-decoration-none">
                        <img class="filter-white" width="74" height="74" src="img/game-controller-icon.svg" />
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="#" class="nav-link px-2 text-white">Games</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">Recent</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                    </ul>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                        <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
                    </form>

                    <div class="text-end">
                        <button type="button" class="btn btn-primary">Register</button>

                        <button type="button" class="btn btn-outline-light me-2">Login</button>
                    </div>
                </div>
            </div>
        </header>

        <div class="px-4 py-5 my-5 text-center">
            <!-- *********** SOURCE: https://www.svgrepo.com/svg/521821/running *************** -->
            <img class="d-block mx-auto mb-4" src="img/running-man.svg" alt="" width="148" height="148">
            <h1 class="display-5 fw-bold">Speedrun Website</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4"> View Speedruns, upload yours, and have them reviewed here!</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Register</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Browse</button>
                </div>
            </div>
        </div>


        <?php
        // put your code here
        ?>

        <!-- good practice to put js after content (I think) in case it takes a long time to fetch-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
