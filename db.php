<?php
$servername = "localhost";
$username   = "root";   // default XAMPP username
$password   = "";       // default password empty
$dbname     = "market_mingle"; // change this

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
