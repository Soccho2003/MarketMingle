<!-- sellerdashboard.php -->
<?php
include('db.php');

$stmt = $pdo->query("SELECT * FROM products WHERE seller_id = {$_SESSION['user_id']}");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <a class="btn" href="addproduct.php">+ Add Product</a>

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
                    echo "<tr>
                            <td>{$p['id']}</td>
                            <td>{$p['title']}</td>
                            <td>{$p['price']}</td>
                            <td>{$p['stock']}</td>
                            <td>{$p['description']}</td>
                            <td><img src='{$p['image']}' alt='{$p['title']}' width='100'></td>
                            <td>
                                <a class='btn' href='editproduct.php?id={$p['id']}'>Edit</a>
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

</body>
</html>
