<?php
include('../Model/customer_dashboard.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - Market Mingle</title>
    <link rel="stylesheet" href="customer_dashboard.css"> <!-- External CSS file for styling -->
</head>
<body>
    <a href="logout.php" class="logout-btn">Logout</a>
    <section id="product-section">
        <div class="container">
            <h1>All Products</h1>

            <!-- View Cart Button -->
             <a href="view_cart.php" class="view-cart-btn">View Cart</a>
           

            <!-- Product Grid -->
            <div class="product-grid">
                <?php
                if ($products) {
                    foreach ($products as $product) {
                        // Convert image to base64 encoding for displaying (if it's stored as BLOB)
                        $imageSrc = '';
                        if ($product['image']) {
                            $imageSrc = 'data:image/jpeg;base64,' . base64_encode($product['image']);
                        }

                        echo "<div class='product-card'>
                                <img src='{$imageSrc}' alt='{$product['title']}' class='product-image'>
                                <h3>{$product['title']}</h3>
                                <p class='price'>BDT {$product['price']}</p>
                                <p class='description'>{$product['description']}</p>
                                <a href='product_detail.php?id={$product['id']}' class='view-details-btn'>View Details</a>
                              </div>";
                    }
                } else {
                    echo "<p>No products available.</p>";
                }
                ?>
            </div>
        </div>
    </section>

</body>
</html>
