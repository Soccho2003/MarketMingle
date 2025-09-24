<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['order_id'])) {
    header('Location: customer_dashboard.php');
    exit();
}

include('db.php');

// Fetch the selected payment method from the form
$payment_method = $_POST['payment_method'];

// Update the order status in the database
$order_id = $_SESSION['order_id'];
$stmt = $pdo->prepare("UPDATE orders SET payment_method = ?, status = 'Completed' WHERE id = ?");
$stmt->execute([$payment_method, $order_id]);

// Redirect to confirmation page or success page
echo "<script>alert('Payment successful! Your order is now complete.'); window.location='order_success.php';</script>";
?>
