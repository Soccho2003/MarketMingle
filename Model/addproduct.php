<?php
session_start();
include "db.php";  // Include the PDO database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get product details from the form
    $title = $_POST['title'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $desc  = $_POST['description'];

    // Check if an image has been uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Get the image details
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageData = file_get_contents($imageTmpName);  // Read image content as binary data

        // Insert product details into the database, including the image as BLOB
        $sql = "INSERT INTO products (title, category, price, stock, description, image, seller_id) 
                VALUES (:title, :category, :price, :stock, :desc, :image, :seller_id)";

        // Assuming seller_id is stored in session (from login)
        $seller_id = $_SESSION['user_id'];

        // Prepare the statement
        $stmt = $pdo->prepare($sql);
        
        // Bind the parameters
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':image', $imageData, PDO::PARAM_LOB);  // Binding image as LOB (Large Object)
        $stmt->bindParam(':seller_id', $seller_id);

        // Execute the query
        if ($stmt->execute()) {
            echo "<script>alert('Product Added Successfully');window.location='../View/sellerdashboard.php';</script>";
        } else {
            echo "Error: Could not add product.";
        }
    } else {
        echo "<script>alert('Please upload an image.');</script>";
    }
}
?>