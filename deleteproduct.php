<?php
session_start();
include('db.php');

// Check if the user is logged in and has the role of 'admin'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Ensure the product ID is provided
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    try {
        // Delete the product from the database
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$product_id]);

        // Redirect with success message
        echo "<script>alert('Product deleted successfully!'); window.location='manage_products.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Product ID not specified.";
}
?>
