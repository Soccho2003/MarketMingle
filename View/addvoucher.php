<?php
include('../Model/addvoucher.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Voucher</title>
    <link rel="stylesheet" href="sellerdash.css">
</head>
<body>
    <h1>Add New Voucher</h1>
    <form method="POST">
        <input type="text" name="code" placeholder="Voucher Code" required>
        <input type="number" name="discount" placeholder="Discount (%)" required>
        <input type="date" name="expiry_date" required>
        <button type="submit" class="btn">Save Voucher</button>
    </form>
    <br>
    <a href="sellerdashboard.php" class="btn"><< Back to Dashboard</a>
</body>
</html>
