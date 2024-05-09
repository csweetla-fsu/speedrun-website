<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php require('actions/dbconnect.php') ?>
<?php require('fragments/session_control.php') ?>
<html>
    <head>
        <?php require('fragments/head_content.php') ?>
    </head>
    <body>
        <?php require('fragments/header.php') ?>


        <main>
            <section class="py-5 text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-bold">Browse by Game</h1>
                        <p class="lead text-muted"></p>
                        <hr>
                    </div>
                </div>
            </section>

            <div class="album py-1 bg-light">
                <div class="container mx-auto row row-cols-1 row-cols-lg-2 g-3">

                    <?php
                    $result = mysqli_query($dbconn, "SELECT * FROM `game`");

                    while ($row = mysqli_fetch_assoc($result)) {
                        $game_name = $row["game_name"];
                        $game_desc = $row["game_desc"];
                        $game_id = $row["game_id"];
                        if (isset($row["game_cover"]) && !empty($row["game_cover"])) {
                            $game_cover = $row["game_cover"];
                        
                        // default cover image... replace this with something else
                        } else {
                            $game_cover = "question_mark.png";
                        }
                        
                        include "fragments/game_card.php";
                    }
                    ?>

                </div>
            </div>

        </main>

        <?php require('fragments/footer.php') ?>
    </body>
</html>
