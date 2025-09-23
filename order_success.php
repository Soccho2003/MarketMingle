<?php
session_start();

// Check if the order was placed
if (!isset($_SESSION['user_id'])) {
    header('Location: customer_dashboard.php');
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
    <?php include('header.php'); ?>  <!-- Include header -->

    <section id="order-success">
        <h1>Thank You for Your Order!</h1>
        <p>Your order has been placed successfully.</p>
        <a href="customer_dashboard.php" class="btn-back">Back to Home</a>
    </section>

    <?php include('footer.php'); ?>  <!-- Include footer -->
</body>
</html>
