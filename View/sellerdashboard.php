<?php include "db.php"; ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Seller Dashboard</title>
  <link rel="stylesheet" href="sellerdash.css"> 
</head>
<body>
  <h1>Seller Dashboard</h1>
  <a class="btn" href="addproduct.php">+Add Product</a>

  <!-- Products -->
  <div class="card">
    <h2>Products</h2>
    <table>
      <tr>
        <th>ID</th><th>Title</th><th>Price</th><th>Stock</th><th>Description</th><th>Actions</th>
      </tr>
      <?php
      $products = $conn->query("SELECT * FROM products");
      if ($products->num_rows > 0) {
        while($p = $products->fetch_assoc()){
          echo "<tr>
            <td>{$p['id']}</td>
            <td>{$p['title']}</td>
            <td>{$p['price']}</td>
            <td>{$p['stock']}</td>
            <td>{$p['description']}</td>
            <td>
              <a class='btn' href='editproduct.php?id={$p['id']}'>Edit</a>
              <a class='btn btn-red' href='deleteproduct.php?id={$p['id']}'>Delete</a>
            </td>
          </tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No products available</td></tr>";
      }
      ?>
    </table>
  </div>

  
  
  <!-- Vouchers -->
  <div class="card"> 
    <h2>Vouchers & Coupons</h2>
    <table>
      <tr>
        <th>ID</th><th>Code</th><th>Discount</th><th>Expiry Date</th><th>Actions</th>
      </tr>
      <?php
      
      $vouchers = $conn->query("SELECT * FROM vouchers");
      if ($vouchers->num_rows > 0) {
        while($v = $vouchers->fetch_assoc()){
          echo "<tr>
            <td>{$v['id']}</td>
            <td>{$v['code']}</td>
            <td>{$v['discount']}</td>
            <td>{$v['expiry_date']}</td>
            <td>
              <a class='btn' href='editvoucher.php?id={$v['id']}'>Edit</a>
              <a class='btn btn-red' href='deletevoucher.php?id={$v['id']}'>Delete</a>
            </td>
          </tr>";
        }
      } else {
        echo "<tr><td colspan='5'>No vouchers available</td></tr>";
      }
      ?>
    </table>
    <a class="btn" href="addvoucher.php">+Add Voucher</a>
  </div>
  
  <div>
    <a href="sellerprofileview.php" class="btn-link">Seller Profile >> </a>
    <a href="salesreport.php" class="btn-link">Sales Report >> </a>
  </div>
   
</body>
</html>
