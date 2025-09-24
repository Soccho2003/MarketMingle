<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success - Market Mingle</title>
    <link rel="stylesheet" href="payment_success.css">
</head>
<body>
    <?php include('header.php'); ?> <!-- Include header -->

    <section id="payment-success">
        <h1>Payment Successful</h1>
        <p>Your payment has been processed successfully. Thank you for your purchase!</p>
        <a href="customer_dashboard.php" class="btn">Back to Dashboard</a>
    </section>

    <?php include('footer.php'); ?> <!-- Include footer -->
</body>
</html>
