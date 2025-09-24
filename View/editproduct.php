<?php
include "db.php";

$id = $_GET['id']; // get product ID from URL
$result = $conn->query("SELECT * FROM products WHERE id=$id"); // fetch product details
$product = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $desc = $_POST['description'];

    $sql = "UPDATE products 
            SET title='$title', price='$price', stock='$stock', description='$desc' 
            WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product edited successfully!');window.location='sellerdashboard.php';</script>";
        
      } else {
        echo "Error: " . $conn->error;
      }
}
?>

<!doctype html>
<html>
<head>
  <title>Edit Product</title>
  <link rel="stylesheet" href="editproduct.css">
</head>
<body>
  

<div class="card">
    <h2>Edit Product</h2>
    <form method="post">
      <input type="text" name="title" value="<?php echo $product['title']; ?>" required>
      <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required>
      <input type="number" name="stock" value="<?php echo $product['stock']; ?>" required>
      <textarea name="description"><?php echo $product['description']; ?></textarea>
      <button type="submit">Update Product</button>
    </form>
    <a href="sellerdashboard.php"> << Back to Dashboard</a>
  </div>
</body>
</html>
