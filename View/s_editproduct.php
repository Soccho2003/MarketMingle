<?php
include ('../Model/s_editproduct.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Admin Dashboard</title>
    <link rel="stylesheet" href="admin_dashboard.css">
    <link rel="stylesheet" href="editproduct.css">
</head>
<body>

    <!-- Edit Product Section -->
    <a href="logout.php" class="logout-btn">Logout</a>
    <a href="sellerdashboard.php" class="back-btn">Back</a>


    <section id="edit-product">
        <h1>Edit Product</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Product Title" value="<?= $product['title'] ?>" required>
            <input type="text" name="category" placeholder="Product Category" value="<?= $product['category'] ?>" required>
            <input type="number" step="0.01" name="price" placeholder="Price (BDT)" value="<?= $product['price'] ?>" required>
            <input type="number" name="stock" placeholder="Stock Quantity" value="<?= $product['stock'] ?>" required>
            <textarea name="description" placeholder="Description" required><?= $product['description'] ?></textarea>

            <!-- Show existing product image -->
            <div>
                <p>Current Image:</p>
                <img src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>" alt="<?= $product['title'] ?>" width="100" height="100">
            </div>

            <!-- Upload New Image -->
            <input type="file" name="image" accept="image/*">

            <button type="submit">Update Product</button>
        </form>
    </section>

</body>
</html>
