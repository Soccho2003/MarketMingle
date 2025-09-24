<?php include('includes/header.php'); ?>
<section id="product-detail">
    <h2>Product Name</h2>
    <img src="assets/images/product1.jpg" alt="Product Name">
    <p>Product Description goes here.</p>
    <p>Price: $300.00</p>
    <form action="cart.php" method="POST">
        <input type="number" name="quantity" value="1" min="1">
        <button type="submit">Add to Cart</button>
    </form>
</section>
<?php include('includes/footer.php'); ?>
