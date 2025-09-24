<?php
session_start();  // Start session for user authentication

// Include database connection
include('db.php');

// Check if product ID is passed in the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Prepare the query to fetch product details by ID
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$product_id]);

    // Fetch the product data
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the product exists
    if (!$product) {
        echo "Product not found.";
        exit();
    }
} else {
    echo "Product ID not specified.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - Market Mingle</title>
    <link rel="stylesheet" href="product_detail.css"> <!-- Link to the external CSS -->
</head>
<body>
    <?php include('header.php'); ?> <!-- Include header -->

    <section id="product-detail">
        <div class="container">
            <!-- Product Card -->
            <div class="product-card">
                <!-- Product Image Displayed -->
                <img src="data:image/jpeg;base64,<?php echo base64_encode($product['image']); ?>" alt="<?php echo $product['title']; ?>" class="product-image">

                <!-- Product Title -->
                <h3><?php echo $product['title']; ?></h3>

                <!-- Product Price -->
                <p class="price">BDT <?php echo $product['price']; ?></p>

                <!-- Product Description -->
                <p class="description"><?php echo $product['description']; ?></p>

                <!-- Stock Availability -->
                <p class="stock">Stock: <?php echo $product['stock']; ?> available</p>

                <!-- Add to Cart Button -->
               <form action="add_to_cart.php" method="POST">
    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">  <!-- Hidden field for product ID -->
    <input type="number" name="quantity" min="1" value="1" required>
    <button type="submit" class="add-to-cart-btn">Add to Cart</button>
</form>

            </div>
        </div>
    </section>

    <?php include('footer.php'); ?> <!-- Include footer -->
</body>
</html>
