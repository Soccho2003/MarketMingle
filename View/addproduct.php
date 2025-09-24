<?php
include('../Model/addproduct.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Market Mingle</title>
    <link rel="stylesheet" href="addproduct.css">  
</head>
<body>
    <div class="card">
        <h2>Add Product</h2>
        <form method="post" enctype="multipart/form-data"> <!-- Add enctype for file uploads -->
            <input type="text" name="title" placeholder="Product Title" required>
            <input type="text" name="category" placeholder="Product Category" required>
            <input type="number" step="0.01" name="price" placeholder="Price (BDT)" required>
            <input type="number" name="stock" placeholder="Stock Quantity" required>
            <textarea name="description" placeholder="Description" required></textarea>
            
            <!-- Product Image Upload -->
            <input type="file" name="image" accept="image/*" required>  <!-- Image input field -->
            
            <button type="submit">Add Product</button>
        </form>
        <a href="sellerdashboard.php"> << Back to Dashboard</a>
    </div>
</body>
</html>
