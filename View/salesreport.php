<?php
include "db.php";

// Total Sales
$result = $conn->query("SELECT SUM(total) AS total_sales FROM orders");
$row = $result->fetch_assoc();
$total_sales = $row['total_sales'] ?? 0;

// Total Orders
$result = $conn->query("SELECT COUNT(*) AS total_orders FROM orders");
$row = $result->fetch_assoc();
$total_orders = $row['total_orders'] ?? 0;

// Best Selling Product
$result = $conn->query("SELECT p.title, SUM(o.quantity) AS sold_qty FROM orders o JOIN products p ON o.product_id=p.id  GROUP BY o.product_id  ORDER BY sold_qty DESC LIMIT 1");
$top_product = $result->fetch_assoc();
?>


<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Sales Report</title>
  <link rel="stylesheet" href="salesreport.css">
</head>
<body>
  <div class="card">
    <h2>Sales Report</h2>
    <div class="stat"> Total Sales: <strong>৳ <?php echo number_format($total_sales,2); ?></strong></div>
    <div class="stat"> Total Orders: <strong><?php echo $total_orders; ?></strong></div>
    <div class="stat"> Best Selling Product: 
      <strong>
        <?php echo $top_product ? $top_product['title']." (".$top_product['sold_qty']." sold)" : "No sales yet"; ?>
      </strong>
    </div>
    <a href="sellerdashboard.php"><< Back to Dashboard</a>
  </div>
</body>
</html>
