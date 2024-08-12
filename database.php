<?php
$servername = "localhost";
$username = "root";  // Update this with your MySQL username
$password = "";      // Update this with your MySQL password
$dbname = "beauty_parlor";  // Make sure this matches your DB name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
