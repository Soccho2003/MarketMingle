<?php
session_start();
include("db.php");

// Check if the user is logged in and has the role of 'admin'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details by ID
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get updated product details
        $title = $_POST['title'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $desc = $_POST['description'];

        // Update the product in the database
        $stmt = $pdo->prepare("UPDATE products SET title = ?, category = ?, price = ?, stock = ?, description = ? WHERE id = ?");
        $stmt->execute([$title, $category, $price, $stock, $desc, $product_id]);

        echo "<script>alert('Product updated successfully!'); window.location='admin_dashboard.php';</script>";
    }
} else {
    echo "Product not found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Admin Dashboard</title>
    <link rel="stylesheet" href="editproduct.css">  
</head>
<body>
    <?php include('header.php'); ?>

    <!-- Edit Product Section -->
    <section id="edit-product">
        <h1>Edit Product</h1>
        <form method="POST">
            <input type="text" name="title" placeholder="Product Title" value="<?= $product['title'] ?>" required>
            <input type="text" name="category" placeholder="Product Category" value="<?= $product['category'] ?>" required>
            <input type="number" step="0.01" name="price" placeholder="Price (BDT)" value="<?= $product['price'] ?>" required>
            <input type="number" name="stock" placeholder="Stock Quantity" value="<?= $product['stock'] ?>" required>
            <textarea name="description" placeholder="Description" required><?= $product['description'] ?></textarea>

            <button type="submit">Update Product</button>
        </form>
        <a href="admin_dashboard.php"><< Back to Dashboard</a>
    </section>

    <?php include('footer.php'); ?>
</body>
</html>
