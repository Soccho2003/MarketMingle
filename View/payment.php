<?php
include ('../Model/payment.php');
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

    <a href="logout.php" class="logout-btn">Logout</a>
    <a href="../View/customer_dashboard.php" class="back-btn">Cancel</a>


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

</body>
</html>
