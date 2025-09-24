<?php
session_start();

// Check if the order was placed
if (!isset($_SESSION['user_id']) || !isset($_SESSION['order_id'])) {
    echo "Order not found or user not logged in.";
    exit();
}

include('db.php'); // Include the database connection

// Fetch order details
// After inserting the order, set the order_id in session
$_SESSION['order_id'] = $order_id;  // Assuming $order_id is the ID of the newly created order
 // Assuming order_id is stored in session after placing the order
$stmt = $pdo->prepare("SELECT * FROM orders WHERE id = ?");
$stmt->execute([$order_id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if order is found
if (!$order) {
    echo "Order not found.";
    exit();
}

// Fetch order items (products in the order)
$stmt_items = $pdo->prepare("SELECT * FROM order_items WHERE order_id = ?");
$stmt_items->execute([$order_id]);
$order_items = $stmt_items->fetchAll(PDO::FETCH_ASSOC);

// Calculate total price
$totalPrice = 0;
foreach ($order_items as $item) {
    $totalPrice += $item['price'] * $item['quantity'];
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
        <p>Your order has been placed successfully. Below are your order details:</p>

        <!-- Order Details Section -->
        <div class="order-details">
            <h3>Order ID: <?php echo $order['id']; ?></h3>
            <p><strong>Status:</strong> <?php echo $order['status']; ?></p>
            <p><strong>Payment Method:</strong> <?php echo $order['payment_method']; ?></p>
            <p><strong>Total Price:</strong> BDT <?php echo number_format($totalPrice, 2); ?></p>
        </div>

        <!-- Order Items Section -->
        <div class="order-items">
            <h3>Items in your order:</h3>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order_items as $item): ?>
                        <tr>
                            <td><?php echo $item['product_name']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>BDT <?php echo number_format($item['price'], 2); ?></td>
                            <td>BDT <?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Redirect to Payment Page -->
        <a href="payment.php" class="btn-pay">Proceed to Payment</a>
    </section>

    <?php include('footer.php'); ?>  <!-- Include footer -->
</body>
</html>
