<?php
session_start();  // Ensure the session is started before any output

// Include database connection
include('db.php');

// Check if the user is logged in and has the role of 'seller'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'seller') {
    header("Location:../View/ login.php");
    exit();
}

// Fetch seller products
$stmt = $pdo->prepare("SELECT * FROM products WHERE seller_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM vouchers WHERE seller_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$vouchers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>