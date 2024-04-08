 <?php
$servername = "localhost";
$username = "root";
$password = null;

// Create connection
$dbconn =  mysqli_connect($servername, $username, $password, "speedrun_website");

// Check connection
if (!$dbconn) {
  die("Database Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully";

