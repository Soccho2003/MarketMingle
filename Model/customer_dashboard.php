<?php
session_start();  // Start session for user authentication

// Include database connection
include('db.php');

// Fetch all products from the database
$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
