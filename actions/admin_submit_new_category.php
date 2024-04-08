<?php
# why does it use path relative to file instead of project root wtf ????
require("dbconnect.php");


# set when user pressed the submit button on the new category form
if (isset($_POST["db_new_cat"])) {
    echo "Attempting to add a new category to the database... <br>";
    
    # for safety: check all required fields set
    # this is horrifying code...
    if (!isset($_POST["cat_game_name"]) || !isset($_POST["cat_desc"]) || !isset($_POST["cat_name"]) 
        || empty($_POST["cat_game_name"]) || empty($_POST["cat_desc"]) || empty($_POST["cat_name"])) {
        
        die("Some required field was not set, so no action was taken <br>");
    }
    
    $cat_game_id = $_POST["cat_game_name"];
    $cat_name = $_POST["cat_name"];
    $cat_desc = $_POST["cat_desc"];
    
    echo "Adding category with name '" . htmlspecialchars($cat_name) . "' and desc '" . htmlspecialchars($cat_desc) . "'<br>";

    
    # prepare statement -> bind parameters -> execute
    $insert_query = mysqli_prepare($dbconn, "INSERT INTO `category`(`category_id`, `category_name`, `category_desc`, `game_id`) VALUES (0,?,?,?)");
    mysqli_stmt_bind_param($insert_query, "ssi", $cat_name, $cat_desc, $cat_game_id);
    mysqli_stmt_execute($insert_query);
    
    $affected_rows = mysqli_affected_rows($dbconn);
    echo "effected rows: " . $affected_rows . "<br>";
} else {
    echo "no action taken";
}


