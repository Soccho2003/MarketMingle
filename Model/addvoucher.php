<?php
session_start(); // Start session for user authentication

// Include database connection
include('db.php');

// Check if the user is logged in and has the role of 'seller'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'seller') {
    header("Location: ../View/login.php");
    exit();
}

// Handle form submission to add voucher
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $discount = $_POST['discount'];
    $expiry_date = $_POST['expiry_date'];

    // Insert voucher into the database
    $sql = "INSERT INTO vouchers (code, discount, expiry_date, seller_id) 
            VALUES (?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$code, $discount, $expiry_date, $_SESSION['user_id']]);

    echo "<script>alert('Voucher added successfully!'); window.location='../View/sellerdashboard.php';</script>";
}
?>