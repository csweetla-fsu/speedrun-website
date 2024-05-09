<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<header class="p-3 text-bg-dark">
    <div class="container col-xl-10 col-xxl-8">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <!-- ******* SOURCE: https://www.svgrepo.com/svg/509121/game-controller **********-->        
            <a href="/" class="d-flex align-items-center mx-4 mb-2 mb-lg-0 text-white text-decoration-none">
                <img class="filter-white" width="74" height="74" src="img/game-controller-icon.svg" />
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="browse_games.php" class="nav-link px-2 text-white">Games</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Recent</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <div class="input-group px-4">
                    <input type="search" class="form-control form-control-dark bg-light text-bg-light" placeholder="Search.." aria-label="Search">
                      <button class="btn btn-primary" type="button" id="button-addon1">Search</button>
                </div>
            </form>

            <div class="text-end">


                
                <?php if (empty($_SESSION['user_id'])) : ?>
                
                <a href="register.php" class="btn btn-primary"> 
                    Register
                </a>
                
                <a href="login.php" class="btn btn-outline-light me-2"> 
                    Login
                </a>
                
                <?php else : ?>
               
                <a href="<?php echo "actions/logout_action.php?" . http_build_query(["back" => $_SERVER['REQUEST_URI']]) ?>" class="btn btn-secondary me-2" >
                    Logout (Logged in as <b><?php echo htmlspecialchars($_SESSION['username']) ?> </b> )
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
