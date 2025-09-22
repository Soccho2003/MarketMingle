<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $discount = $_POST['discount'];
    $expiry_date = $_POST['expiry_date'];

    $sql = "INSERT INTO vouchers (code, discount, expiry_date) 
            VALUES ('$code', '$discount', '$expiry_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Voucher added successfully!');window.location='sellerdashboard.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Add Voucher</title>
  <link rel="stylesheet" href="sellerdash.css">
</head>
<body>
  <div class="card">
    <h2>Add New Voucher</h2>
    <form method="post">
      <input type="text" name="code" placeholder="Voucher Code" required>
      <input type="number" name="discount" placeholder="Discount (%)" required>
      <input type="date" name="expiry_date" required>
      <button type="submit" class="btn">Save Voucher</button>
    </form>
    <br>
    <a href="sellerdashboard.php" class="btn"><< Back to Dashboard</a>
  </div>
</body>
</html>
