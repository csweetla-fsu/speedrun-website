<?php

require "dbconnect.php";

$user = $_POST["username"];
$pwd = $_POST["password"];

if (!isset($_SESSION)) {
    session_start();
}

$_SESSION["login_errors"] = array();

$stmt = $dbconn->prepare("SELECT user_id, user_type, password FROM user WHERE username = ?");
$stmt->bind_param("s", $user);
if($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows == 1)
    {
        $user_row = $result->fetch_assoc();
        
        if (!password_verify($pwd, $user_row["password"]))
        {
            $_SESSION["login_errors"][] = "Incorrect Password.";
        } else {
            echo "<br> Statement executed successfully! <br>";
            echo "Effected rows: " . $result->num_rows  . "<br>"; 
            unset($_SESSION["login_errors"]);
        }
    }
    else {
        $_SESSION["login_errors"][] = "A user with username " . $user . " does not exist.";
    }
}

$stmt->close();
$dbconn->close();

if (!empty($user_row) && empty($_SESSION["login_errors"]))
{
    $_SESSION["user_id"] = $user_row["user_id"];
    $_SESSION["user_name"] = $user;
    $_SESSION["user_type"] = $user_row["user_type"];
    echo "Logged in user " . $user . "<br>";
    header("location: /index.php");
}
else {
    header("location: /login.php");
}
exit();