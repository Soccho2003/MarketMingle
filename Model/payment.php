<?php
session_start();

// Check if the user is logged in and if the order exists in the session
if (!isset($_SESSION['user_id']) || !isset($_SESSION['order_id'])) {
    header('Location: ../View/login.php'); // Redirect to login if not logged in or order ID doesn't exist
    exit();
}

include('db.php'); // Include the database connection

// Fetch order details from the database
$order_id = $_SESSION['order_id'];
$stmt = $pdo->prepare("SELECT * FROM orders WHERE id = ?");
$stmt->execute([$order_id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

// If the order doesn't exist, redirect
if (!$order) {
    echo "<script>alert('Order not found.'); window.location='../View/index.php';</script>";
    exit();
}

?>