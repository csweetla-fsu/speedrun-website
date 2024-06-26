<?php
# why does it use path relative to file instead of project root wtf ????
require("dbconnect.php");

if (!isset($_SESSION)) {
    session_start();
}

# set when user pressed the submit button on the new game form
if (isset($_POST["db_new_game"]) && $_SESSION['user_type'] == 'admin') {
    echo "Attempting to add a new game to the database... <br>";
    
# for safety: check if game_name or game_desc was set
    if (!isset($_POST["game_name"]) || !isset($_POST["game_desc"]) || empty($_POST["game_name"]) || empty($_POST["game_desc"])) {
        die("Either game_name or game_desc was not set, so no action was taken <br>");
    }
    
    $game_name = $_POST["game_name"];
    $game_desc = $_POST["game_desc"];
    echo "Adding game with name '" . htmlspecialchars($game_name) . "' and desc '" . htmlspecialchars($game_desc) . "'<br>";
//    File Upload. Doesn't currently work...
    if (isset($_FILES["game_cover"]["name"]) && $_FILES["game_cover"]["size"] > 0 && $_FILES["game_cover"]["error"] == 0) {
        $file_name = $_FILES["game_cover"]["name"];
        $save_path = dirname(__FILE__) . "/../img/game_covers/" . $file_name;
        echo "Uploading file to.. : " . $save_path . "<br/>";
        move_uploaded_file($_FILES["game_cover"]["tmp_name"], $save_path);
    }
//    
    // prepare statement -> bind parameters -> execute
    $insert_query = mysqli_prepare($dbconn, "INSERT INTO `game`(`game_name`, `game_desc`, `game_cover`) VALUES (?,?,?)");
    mysqli_stmt_bind_param($insert_query, "sss", $game_name, $game_desc, $file_name);
    mysqli_stmt_execute($insert_query);
    
    $affected_rows = mysqli_affected_rows($dbconn);
    echo "effected rows: " . $affected_rows . "<br>";
} else {
    echo "no action taken";
}


