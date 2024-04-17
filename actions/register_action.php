<?php

// Verify we receieved a POST request
if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') {
    die("registerAction requires POST request");
}

include 'dbconnect.php';

// found here https://www.sitepoint.com/community/t/ensuring-unique-user-info-for-username-email-and-phone/293400/3
function username_taken($uname, $dbconn) {
    $q = $dbconn->prepare("SELECT user_id FROM user WHERE username = ?");
    $q->bind_param('s', $uname);
    $q->execute();
    $r = $q->get_result();
    return ($r->fetch_assoc() > 0) ? true : false;
}

print_r($_POST);

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);
$confirm_password = trim($_POST["confirm_password"]);
//$email = trim($_POST["email"]);

if (!isset($_SESSION)) {
    session_start();
}
$_SESSION["registration"]["errors"] = array();

// not using email at this time
//// validate email
//if (empty($email)) {
//    $_SESSION["registration"]["errors"][] = "Please Enter an Email!";
//} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//    $_SESSION["registration"]["errors"][] = "Email entered is invalid.";
//}

// validate username
if (empty($username)) {
    $_SESSION["registration"]["errors"][] = "Please Enter a Username!";
} else if (username_taken($username, $dbconn)) {
    $_SESSION["registration"]["errors"][] = "The username " . $username . " is already taken.";
} else {
    if (strlen($username) < 3) {
        $_SESSION["registration"]["errors"][] = "Username must be at least 3 characters.";
    } else if (strlen($username) > 30) {
        $_SESSION["registration"]["errors"][] = "Username must be at most 30 characters.";
    }
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $_SESSION["registration"]["errors"][] = "Username must contain only letters, numbers and underscores.";
    }
}

// validate password
if (empty($password)) {
    $_SESSION["registration"]["errors"][] = "Please Enter a Password!";
} else if (strlen($password) < 5) {
    $_SESSION["registration"]["errors"][] = "Password must be at least 5 characters.";
} elseif (empty($confirm_password)) {
    $_SESSION["registration"]["errors"][] = "Please confirm your password!";
} elseif ($password != $confirm_password) {
    $_SESSION["registration"]["errors"][] = "Confirmation password doesn't match!";
}
// go back to register page if there was errors
if (!empty($_SESSION["registration"]["errors"])) {
    header('Location: /register.php');
    exit();
}

// hash the password
$password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $dbconn->prepare("INSERT INTO user (user_id, username, password, user_type) VALUES (0, ?, ?, 'basic')");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->close();
$dbconn->close();
header('Location: /index.php');
exit();
