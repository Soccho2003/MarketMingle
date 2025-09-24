<?php
include('../Model/sellerdashboard.php');


?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Seller Dashboard</title>
    <link rel="stylesheet" href="sellerdash.css">
</head>
<body>
    <h1>Seller Dashboard</h1>
    <a href="logout.php" class="logout-btn">Logout</a>
    <a href="sellerprofile.php" class="profile-btn">Profile</a>
    <a href="salesreport.php" class="sales-btn">Sales</a>
    <a class="btn" href="addproduct.php">+ Add Product</a>
    <a class="btn" href="addvoucher.php">+ Add Voucher</a> <!-- Link to Add Voucher -->

    <!-- Products Section -->
    <div class="card">
        <h2>Your Products</h2>
        <table>
            <tr>
                <th>ID</th><th>Title</th><th>Price</th><th>Stock</th><th>Description</th><th>Image</th><th>Actions</th>
            </tr>
            <?php
            if ($products) {
                foreach ($products as $p) {
                    // If the product has an image, encode it to Base64
                    $imageSrc = '';
                    if ($p['image']) {
                        $imageSrc = 'data:image/jpeg;base64,' . base64_encode($p['image']);
                    }

                    echo "<tr>
                            <td>{$p['id']}</td>
                            <td>{$p['title']}</td>
                            <td>{$p['price']}</td>
                            <td>{$p['stock']}</td>
                            <td>{$p['description']}</td>
                            <td><img src='{$imageSrc}' alt='{$p['title']}' width='100' height='100'></td>
                            <td>
                                <a class='btn' href='s_editproduct.php?id={$p['id']}'>Edit</a>
                                <a class='btn btn-red' href='deleteproduct.php?id={$p['id']}'>Delete</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No products available</td></tr>";
            }
            ?>
        </table>
    </div>

    <!-- Vouchers Section -->
    <div class="card">
        <h2>Your Vouchers</h2>
        <table>
            <tr>
                <th>Voucher Code</th><th>Discount (%)</th><th>Expiry Date</th><th>Actions</th>
            </tr>
            <?php
            if ($vouchers) {
                foreach ($vouchers as $voucher) {
                    echo "<tr>
                            <td>{$voucher['code']}</td>
                            <td>{$voucher['discount']}</td>
                            <td>{$voucher['expiry_date']}</td>
                            <td>
                                <a class='btn' href='editvoucher.php?id={$voucher['id']}'>Edit</a>
                                <a class='btn btn-red' href='deletevoucher.php?id={$voucher['id']}'>Delete</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No vouchers available</td></tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>
