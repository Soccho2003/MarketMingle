<?php
session_start();

// Check if the user is logged in and has a valid order
if (!isset($_SESSION['user_id']) || !isset($_SESSION['order_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in or order ID doesn't exist
    exit();
}

include('db.php'); // Include the database connection

// Fetch the order details
$order_id = $_SESSION['order_id'];
$stmt = $pdo->prepare("SELECT * FROM orders WHERE id = ?");
$stmt->execute([$order_id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

// If the order doesn't exist, redirect
if (!$order) {
    echo "<script>alert('Order not found.'); window.location='index.php';</script>";
    exit();
}

// Get payment method from POST data
$payment_method = $_POST['payment_method'];

// Insert the payment details into the payments table
$stmt_payment = $pdo->prepare("INSERT INTO payments (order_id, payment_method, amount, status) 
                               VALUES (?, ?, ?, ?)");
$stmt_payment->execute([$order_id, $payment_method, $order['total_price'], 'pending']);

// After inserting, update the order status to 'processing' or 'paid'
$stmt_order = $pdo->prepare("UPDATE orders SET status = ? WHERE id = ?");
$stmt_order->execute(['processing', $order_id]); // Or 'paid', based on your logic

// Redirect to payment success page
header('Location: payment_success.php'); // Redirect to payment success page
exit();
?>
