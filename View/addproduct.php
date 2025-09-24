<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $desc = $_POST['description'];

    $sql = "INSERT INTO products (title, price, stock, description) 
            VALUES ('$title', '$price', '$stock', '$desc')";
    
   
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product added successfully!');window.location='sellerdashboard.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Add Product</title>
  <link rel="stylesheet" href="addproduct.css">
</head>
<body>
  <div class="card">
    <h2>Add Product</h2>
    <form method="post">
      <input type="text" name="title" placeholder="Product Title" required>
      <input type="number" step="0.01" name="price" placeholder="Price (BDT)" required>
      <input type="number" name="stock" placeholder="Stock Quantity" required>
      <textarea name="description" placeholder="Description"></textarea>
      <button type="submit">Add Product</button>
    </form>
    <a href="sellerdashboard.php"> << Back to Dashboard</a>
  </div>
</body>
</html>
