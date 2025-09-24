<?php
session_start();

// Check if the user is logged in and if the order exists in the session
if (!isset($_SESSION['user_id']) || !isset($_SESSION['order_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in or order ID doesn't exist
    exit();
}

include('db.php'); // Include the database connection

// Fetch order details from the database
$order_id = $_SESSION['order_id'];
$stmt = $pdo->prepare("SELECT * FROM orders WHERE id = ?");
$stmt->execute([$order_id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

// If the order doesn't exist, redirect
if (!$order) {
    echo "<script>alert('Order not found.'); window.location='index.php';</script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Market Mingle</title>
    <link rel="stylesheet" href="payment.css">
</head>
<body>
    <?php include('header.php'); ?> <!-- Include header -->

    <section id="payment">
        <h1>Payment for Order #<?php echo $order['id']; ?></h1>
        <p>Total Price: BDT <?php echo number_format($order['total_price'], 2); ?></p>

        <form action="process_payment.php" method="POST">
            <h3>Select Payment Method</h3>
            <select name="payment_method" required>
                <option value="credit_card">Credit Card</option>
                <option value="Bkash">Bkash</option>
                <option value="bank_transfer">Bank Transfer</option>
            </select>
            
            <button type="submit" class="btn-pay">Proceed to Payment</button>
        </form>
    </section>

    <?php include('footer.php'); ?> <!-- Include footer -->
</body>
</html>
