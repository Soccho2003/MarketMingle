<?php
$host = 'localhost';         // Your MySQL server (localhost if running locally)
$username = 'root';          // Default username for XAMPP is 'root'
$password = '';              // Default password for XAMPP is an empty string
$dbname = 'marketmingle'; // Your database name

try {
    // Create a PDO instance to connect to the database
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Error handling
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
