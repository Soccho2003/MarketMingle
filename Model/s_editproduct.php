<?php
session_start();  // Start session for user authentication

// Include database connection
include('db.php');

// Check if the user is logged in and has the role of 'admin'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'seller') {
    header("Location: ../View/login.php");
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

        // Check if a new image is uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            // Get new image data
            $imageTmpName = $_FILES['image']['tmp_name'];
            $imageData = file_get_contents($imageTmpName);  // Read image content as binary data

            // Update the product with the new image
            $stmt = $pdo->prepare("UPDATE products SET title = ?, category = ?, price = ?, stock = ?, description = ?, image = ? WHERE id = ?");
            $stmt->execute([$title, $category, $price, $stock, $desc, $imageData, $product_id]);
        } else {
            // If no new image, update the product without changing the image
            $stmt = $pdo->prepare("UPDATE products SET title = ?, category = ?, price = ?, stock = ?, description = ? WHERE id = ?");
            $stmt->execute([$title, $category, $price, $stock, $desc, $product_id]);
        }

        echo "<script>alert('Product updated successfully!'); window.location='../View/sellerdashboard.php';</script>";
    }
} else {
    echo "Product not found.";
}
?>