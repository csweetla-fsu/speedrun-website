<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php require('actions/dbconnect.php') ?>


<?php
require('fragments/session_control.php');

if (!is_string($_GET["game_id"])) {
    header("location: /index.php");
    die();
}

$stmt = $dbconn->prepare("SELECT game_name, game_desc, game_cover FROM game WHERE game_id = ?");
$stmt->bind_param("i", $_GET["game_id"]);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $game_name = $row["game_name"];
    } else {
        echo "db error!";
        die();
    }
}
?>
<html>
    <head>
        <?php require('fragments/head_content.php') ?>
    </head>
    <body>
        <?php require('fragments/header.php') ?>


        <main>
            <section class="py-5 text-center container">
                <div class="row py-lg-5 mx-2">
                    <h1 class="fw-bold">Browse Categories for <?php echo htmlspecialchars($game_name) ?></h1>
                    <hr>
                </div>
            </section>
            
            <section class="container mx-auto px-4">
                <ol class="list-group">
                <?php
               
                $stmt = $dbconn->prepare("SELECT category_id, category_name, category_desc FROM category WHERE game_id = ?");
                $stmt->bind_param("i", $_GET["game_id"]);
                if($stmt->execute()) {
                    $result = $stmt->get_result();
                    while($row = $result->fetch_assoc()) {
                        echo '<a href="browse_category?' . http_build_query(["category" => $row["category_id"]]) . '" style="all:unset">' .
                        '<li class="list-group-item d-flex justify-content-between align-items-start">'
                                . '<div class="ms-2 me-auto">'
                                . '<div class="fw-bold">'. $row["category_name"] .'</div>'
                                . $row["category_desc"]
                                . '</div></li></a>';
                    }     
                }
                ?>
                </ol>
               
            </section>


        </main>

        <?php require('fragments/footer.php') ?>
    </body>
</html>