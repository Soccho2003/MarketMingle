<?php
$servername = "localhost";
$username   = "root";   
$password   = "";       
$dbname     = "market_mingle"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
