<?php
// Start the session
session_start();

// Include the database connection
include('db.php');


// Fetch all products from the database
$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Mingle - Home</title>
    <link rel="stylesheet" href="styles.css"> <!-- External CSS file for styling -->
</head>
<body>
    <?php include('header.php'); ?> <!-- Include header -->

    <!-- Hero Section -->
    <section id="hero">
        <div class="hero-content">
            <h1>Welcome to Market Mingle</h1>
            <p>Your one-stop shop for buying and selling products.</p>
            
        </div>
    </section>

    <!-- Featured Products Section -->
    <section id="featured-products">
        <h2>All Products</h2>
        <div class="product-grid">
            <?php
            // Loop through products and display each one
            if ($products) {
                foreach ($products as $product) {
                    // Fetch image as base64 (if it's stored as BLOB in database)
                    $imageSrc = 'data:image/jpeg;base64,' . base64_encode($product['image']);
                    
                    echo "<div class='product-card'>
                            <img src='{$imageSrc}' alt='{$product['title']}' class='product-image'>
                            <h3>{$product['title']}</h3>
                            <p class='price'>BDT {$product['price']}</p>
                            <p class='description'>{$product['description']}</p>
                            <a href='login.php?id={$product['id']}' class='btn-view-details'>View Details</a>
                          </div>";
                }
            } else {
                echo "<p>No products available.</p>";
            }
            ?>
        </div>
    </section>

    <?php include('footer.php'); ?> <!-- Include footer -->
</body>
</html>
