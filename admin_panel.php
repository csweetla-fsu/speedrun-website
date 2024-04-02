<?php require('actions/dbconnect.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require('fragments/head_content.php') ?>
    </head>
    <body>
        <?php require('fragments/header.php') ?>

        <h1 class="display-6 lh-1 text-body-emphasis m-5 text-center">Admin Panel</h1>

        <!-- Container-->
        <div class="container-md">
            <div class="card border shadow rounded my-4">

                <div class="card-header"> 
                    New Game
                </div>

                <form class="p-4 p-md-5">
                    <!-- NAME INPUT -->
                    <div class="mb-3">
                        <label for="game_name" class="form-label">Game Name</label>
                        <input type="text" class="form-control" id="game_name" name="game_name" placeholder="">
                    </div>

                    <!-- DESC INPUT -->
                    <div class="mb-3">
                        <label for="game_desc" class="form-label">Game Description</label>
                        <textarea class="form-control" id="game_desc" name="game_desc" rows="4"></textarea>
                    </div>

                    <!-- COVER INPUT (file) -->
                    <div class="mb-4">
                        <label for="game_cover" class="form-label">Game Cover</label>
                        <input class="form-control" type="file" id="game_cover">
                    </div>

                    <!-- SUBMIT / RESET BUTTONS -->
                    <div class="container pt-3">
                        <div class="row gx-1">
                            <div class="col-6">
                                <button class="btn btn-lg btn-primary w-100" type="submit">Submit</button>
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

                <form class="p-4 p-md-5">
                    <!-- GAME SELECT (Game the category applies to)-->
                    <div class="mb-3">
                        <label for="cat_game_name" class="form-label">Game</label>
                        
                        <select class="form-select" id="cat_game_name" name="cat_game_name">
                          <option selected>Select Game</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                    </div>
                    
                    <!-- NAME INPUT -->
                    <div class="mb-3">
                        <label for="cat_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="">
                    </div>

                    <!-- DESC INPUT -->
                    <div class="mb-4">
                        <label for="exampleFormControlTextarea1" class="form-label">Category Description</label>
                        <textarea class="form-control" id="game_desc" rows="4"></textarea>
                    </div>

                    <!-- SUBMIT / RESET BUTTONS -->
                    <div class="container pt-3">
                        <div class="row gx-1">
                            <div class="col-6">
                                <button class="btn btn-lg btn-primary w-100" type="submit">Submit</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-lg btn-secondary w-100" type="reset"> Reset </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            
        </div>
        <?php require('fragments/footer.php') ?>
    </body>
</html>
