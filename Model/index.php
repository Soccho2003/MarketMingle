<?php
// Start the session
session_start();

// Include the database connection
include('db.php');


// Fetch all products from the database
$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>