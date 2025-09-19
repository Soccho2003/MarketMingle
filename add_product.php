<?php include('includes/header.php'); ?>

<section id="add-product">
    <h2>Add New Product</h2>
    <form action="add_product_action.php" method="POST">
        <label for="product-name">Product Name:</label>
        <input type="text" id="product-name" name="product-name" required placeholder="Enter product name">

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required placeholder="Enter category"> 

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required placeholder="Enter product price">

        <label for="description">Description:</label>
        <textarea id="description" name="description" required placeholder="Enter product description"></textarea>

        <button type="submit" class="save-btn">Save Product</button>
    </form>
</section>
 <?php // includinh header file
include('includes/footer.php'); ?>
