<?php
session_start();  // Start session for user authentication

// Include database connection
include('db.php');

// Check if product ID is passed in the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Prepare the query to fetch product details by ID
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$product_id]);

    // Fetch the product data
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the product exists
    if (!$product) {
        echo "Product not found.";
        exit();
    }
} else {
    echo "Product ID not specified.";
    exit();
}
?>