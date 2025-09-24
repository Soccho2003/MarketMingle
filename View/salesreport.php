<?php
include ("../Model/salesreport.php");
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Sales Report</title>
  <link rel="stylesheet" href="salesreport.css">
</head>
<body>

  <a href="logout.php" class="logout-btn">Logout</a>
  <a href="../View/sellerdashboard.php" class="back-btn">Back</a>
  
  <div class="card">
    <h2>Sales Report</h2>
    <div class="stat"> Total Sales: <strong>৳ <?php echo number_format($total_sales, 2); ?></strong></div>
    <div class="stat"> Total Orders: <strong><?php echo $total_orders; ?></strong></div>
    <div class="stat"> Best Selling Product: 
      <strong>
        <?php echo $top_product ? $top_product['product_name']." (৳ ".$top_product['total_sales'].")" : "No sales yet"; ?>
      </strong>
    </div>
  </div>

  <div class="card">
    <h2>Payments</h2>
    <table>
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Payment Method</th>
          <th>Status</th>
          <th>Amount</th>
          <th>Created At</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($payments) {
          foreach ($payments as $payment) {
            echo "<tr>
                    <td>{$payment['order_id']}</td>
                    <td>{$payment['payment_method']}</td>
                    <td>{$payment['status']}</td>
                    <td>৳ {$payment['amount']}</td>
                    <td>{$payment['created_at']}</td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='5'>No payments available</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

</body>
</html>
