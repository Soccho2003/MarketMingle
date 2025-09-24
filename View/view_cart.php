<?php
include ('../Model/view_cart.php');
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
    <a href="logout.php" class="logout-btn">Logout</a>
    <a href="../View/customer_dashboard.php" class="back-btn">Back</a>

    <section id="cart">
        <h1>Your Cart</h1>

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th> <!-- For delete button -->
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
                            <td><a href='view_cart.php?delete_id={$item['product_id']}'>Delete</a></td> <!-- Delete link -->
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

</body>
</html>