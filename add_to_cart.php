<?php
session_start();
include('db.php');

// Check if the product id and quantity are passed
if (isset($_POST['product_id'], $_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    
    // Get product details from the database
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        // Check if the cart already exists in the session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Add the product to the cart
        $_SESSION['cart'][] = [
            'product_id' => $product['id'],
            'title' => $product['title'],
            'price' => $product['price'],
            'quantity' => $quantity,
            'total_price' => $product['price'] * $quantity,
        ];

        echo "<script>alert('Product added to cart'); window.location='product_detail.php?id={$product['id']}';</script>";
    } else {
        echo "Product not found.";
    }
}
?>
