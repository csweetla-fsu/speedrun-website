<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SERVER['REQUEST_URI'] !== "/register.php") {
    unset($_SESSION["registration"]);
}
if ($_SERVER['REQUEST_URI'] !== "/login.php") {
    unset($_SESSION["login_errors"]);
}
?>