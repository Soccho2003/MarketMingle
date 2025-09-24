<?php
session_start();  // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Check if the cart exists
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<script>alert('Your cart is empty.'); window.location='index.php';</script>";
    exit();
}

include('db.php');  // Include the database connection

// Initialize total price
$totalPrice = 0;

// Loop through the cart and calculate the total price
foreach ($_SESSION['cart'] as $item) {
    $totalPrice += $item['price'] * $item['quantity'];
}

// Insert the order into the orders table
$stmt = $pdo->prepare("INSERT INTO orders (user_id, total_price, status) VALUES (?, ?, ?)");
$stmt->execute([$_SESSION['user_id'], $totalPrice, 'pending']);  // Status is set to 'pending'

// Get the last inserted order ID
$order_id = $pdo->lastInsertId();

// Store the order ID in the session
$_SESSION['order_id'] = $order_id;

// Insert the order items into the order_items table
foreach ($_SESSION['cart'] as $item) {
    $stmt_item = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    $stmt_item->execute([$order_id, $item['product_id'], $item['quantity'], $item['price']]);
}

// Clear the cart after the order is placed
unset($_SESSION['cart']);

// Redirect to the payment page
header("Location: payment.php");  // Redirect to payment page
exit();
?>
