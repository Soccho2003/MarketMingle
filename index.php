
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Mingle</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <?php include('../includes/header.php'); ?>

   
    <section id="hero">
        <div class="hero-content">
            <h1>Welcome to Market Mingle</h1>
            <p>Your one-stop shop for buying and selling products.</p>
            <button class="cta-btn">Browse Products</button>
        </div>
    </section>

   
    <section id="featured-products">
        <h2>Featured Products</h2>
        <div class="product-grid">
            <div class="product-card">
                <img src="assets/images/product1.jpg" alt="Product 1">
                <h3>Product 1</h3>
                <p>BDT 200.00</p>
                <a href="product.php?id=1" class="btn-view-details">View Details</a>
            </div>
            <div class="product-card">
                <img src="assets/images/product2.jpg" alt="Product 2">
                <h3>Product 2</h3>
                <p>BDT 250.00</p>
                <a href="product.php?id=2" class="btn-view-details">View Details</a>
            </div>
            <div class="product-card">
                <img src="assets/images/product3.jpg" alt="Product 3">
                <h3>Product 3</h3>
                <p>BST300.00</p>
                <a href="product.php?id=3" class="btn-view-details">View Details</a>
            </div>
        </div>
    </section>

    <?php include('includes/footer.php'); ?>
</body>
</html>
