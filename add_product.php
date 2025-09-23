<?php
include "db.php";  // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get product details from the form
    $title = $_POST['title'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $desc  = $_POST['description'];

    // Check if an image has been uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Get the image details
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageData = file_get_contents($imageTmpName);  // Read image content as binary data

        // Insert product details into the database, including the image as BLOB
        $sql = "INSERT INTO products (title, price, stock, description, image) 
                VALUES (?, ?, ?, ?, ?)";

        // Prepare the statement
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $price, $stock, $desc, $imageData]);

        echo "<script>alert('Product Added Successfully');window.location='seller_dashboard.php';</script>";
    } else {
        echo "Please upload an image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Market Mingle</title>
</head>
<body>
    <div class="card">
        <h2>Add Product</h2>
        <form method="post" enctype="multipart/form-data"> <!-- Added enctype for file uploads -->
            <input type="text" name="title" placeholder="Product Title" required>
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
