<?php
session_start(); // Start session to access the cart and user data

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

// Check if the cart exists in the session
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<script>alert('Your cart is empty.'); window.location='index.php';</script>";
    exit();
}

include('db.php');  // Include the database connection

// Initialize total price
$totalPrice = 0;

// Start a transaction to ensure data integrity
try {
    // Begin transaction
    $pdo->beginTransaction();

    // Loop through each item in the cart and insert order details into the orders table
    foreach ($_SESSION['cart'] as $item) {
        $product_name = $item['title'];
        $quantity = $item['quantity'];
        $price = $item['price'];
        $totalPrice += $quantity * $price;

        // Insert order details into the 'orders' table
        $stmt = $pdo->prepare("INSERT INTO orders (user_id, product_name, price, status) 
                               VALUES (?, ?, ?, 'pending')");
        $stmt->execute([$_SESSION['user_id'], $product_name, $totalPrice]);

        // Update product stock in the 'products' table
        $stmt = $pdo->prepare("UPDATE products SET stock = stock - ? WHERE id = ?");
        $stmt->execute([$quantity, $item['id']]);
    }

    // Commit transaction if everything is successful
    $pdo->commit();

    // Clear the cart
    unset($_SESSION['cart']);
    
    echo "<script>alert('Order placed successfully!'); window.location='order_success.php';</script>";

} catch (Exception $e) {
    // Rollback the transaction in case of error
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
