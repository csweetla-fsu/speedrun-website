<?php require('actions/dbconnect.php') ?>
<?php require('fragments/session_control.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require('fragments/head_content.php') ?>
    </head>
    <body>
        <?php require('fragments/header.php') ?>
        
        
        <?php if ($_SESSION['user_type'] == 'admin') : ?>
        <h1 class="display-6 lh-1 text-body-emphasis m-5 text-center">Admin Panel</h1>

        <!-- Container-->
        <div class="container-md">
            <div class="card border shadow rounded my-4">

                <div class="card-header"> 
                    New Game
                </div>

                <form class="p-4 p-md-5" action="actions/admin_submit_new_game.php" method="post" autocomplete="off" enctype="multipart/form-data">
                    <!-- NAME INPUT -->
                    <div class="mb-3">
                        <label for="game_name" class="form-label">Game Name</label>
                        <input type="text" class="form-control" id="game_name" name="game_name" placeholder="" required>
                    </div>

                    <!-- DESC INPUT -->
                    <div class="mb-3">
                        <label for="game_desc" class="form-label">Game Description</label>
                        <textarea class="form-control" id="game_desc" name="game_desc" rows="4" required></textarea>
                    </div>


                    <!-- COVER INPUT (file) -->
                    <div class="mb-4">
                        <label for="game_cover" class="form-label">Game Cover</label>
                        <input class="form-control" type="file" accept="image/*" name="game_cover" id="game_cover" value="">
                    </div>

                    <!-- SUBMIT / RESET BUTTONS -->
                    <div class="container pt-3">
                        <div class="row gx-1">
                            <div class="col-6">
                                <button class="btn btn-lg btn-primary w-100" type="submit" name="db_new_game">Submit</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-lg btn-secondary w-100" type="reset"> Reset </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            
            <div class="card border shadow rounded my-4">

                <div class="card-header"> 
                    New Speedrun Category
                </div>

                <form class="p-4 p-md-5" action="actions/admin_submit_new_category.php" method="post" autocomplete="off">
                    <!-- GAME SELECT (Game the category applies to)-->
                    <div class="mb-3">
                        <label for="cat_game_name" class="form-label">Game</label>
                        
                        <select class="form-select" id="cat_game_name" name="cat_game_name" required>
                          <option selected value="">-- SELECT GAME --</option>
                          <!-- add option for every game in the db -->
                          <?php 
                          
                            $result = mysqli_query($dbconn, "SELECT `game_id`, `game_name` FROM `game`");
                          
                            while ($row = mysqli_fetch_assoc($result)) { 
                                echo "<option value=\"" . $row["game_id"] . "\">" . $row["game_name"] . "</option>\n"; 
                            } 
                            ?>
                          
                        </select>
                    </div>
                    
                    <!-- NAME INPUT -->
                    <div class="mb-3">
                        <label for="cat_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="" required>
                    </div>

                    <!-- DESC INPUT -->
                    <div class="mb-4">
                        <label for="exampleFormControlTextarea1" class="form-label">Category Description</label>
                        <textarea class="form-control" id="cat_desc" name="cat_desc" rows="4" required></textarea>
                    </div>

                    <!-- SUBMIT / RESET BUTTONS -->
                    <div class="container pt-3">
                        <div class="row gx-1">
                            <div class="col-6">
                                <button class="btn btn-lg btn-primary w-100" type="submit" name="db_new_cat">Submit</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-lg btn-secondary w-100" type="reset"> Reset </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            
        </div>
        <?php else : ?>
            <h1 class="display-6 lh-1 text-body-emphasis m-5 text-center">Not Authorized</h1>
        <?php endif; ?>
        <?php require('fragments/footer.php') ?>
    </body>
</html>
