<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');  // Redirect to login if not logged in
    exit();
}

// Check if the order was successfully placed
if (!isset($_SESSION['order_id'])) {
    echo "<script>alert('Order not found.'); window.location='index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success - Market Mingle</title>
    <link rel="stylesheet" href="order_success.css">
</head>
<body>
    <?php include('header.php'); ?> <!-- Include header -->

    <section id="order-success">
        <h1>Thank You for Your Order!</h1>
        <p>Your order has been placed successfully. You will receive a confirmation email shortly.</p>
        <p>Your order ID is: <?php echo $_SESSION['order_id']; ?></p>

        <a href="customer_dashboard.php" class="btn-back">Back to Dashboard</a>
    </section>

    <?php include('footer.php'); ?> <!-- Include footer -->
</body>
</html>
