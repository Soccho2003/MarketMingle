<?php
session_start();

// Check if the cart exists in the session
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<script>alert('Your cart is empty.'); window.location='index.php';</script>";
    exit();
}

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include('db.php');  // Include the database connection

// Initialize total price
$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart - Market Mingle</title>
    <link rel="stylesheet" href="view_cart.css">
</head>
<body>
    <?php include('header.php'); ?> <!-- Include header -->

    <section id="cart">
        <h1>Your Cart</h1>

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through the cart and display items
                foreach ($_SESSION['cart'] as $item) {
                    $productTotal = $item['price'] * $item['quantity'];
                    $totalPrice += $productTotal;
                    
                    echo "<tr>
                            <td>{$item['title']}</td>
                            <td>BDT {$item['price']}</td>
                            <td>{$item['quantity']}</td>
                            <td>BDT {$productTotal}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="total">
            <h3>Total: BDT <?php echo $totalPrice; ?></h3>
        </div>

        <form action="place_order.php" method="POST">
            <button type="submit" class="btn">Place Order</button>
        </form>
    </section>

    <?php include('footer.php'); ?> <!-- Include footer -->
</body>
</html>
