<?php
session_start();

// Include the database connection
include('db.php');

// Check if the user is logged in and has the role of 'admin'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location:../View/login.php");
    exit();
}

// Handle payment deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    try {
        // Prepare delete query
        $stmt = $pdo->prepare("DELETE FROM payments WHERE id = ?");
        $stmt->execute([$delete_id]);

        echo "<script>alert('Payment deleted successfully!'); window.location='../View/manage_payments.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Fetch all payment details
$stmt = $pdo->prepare("SELECT * FROM payments");
$stmt->execute();
$payments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>