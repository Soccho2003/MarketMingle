<?php
session_start(); // Start session for user authentication

// Include database connection
include("db.php");

// Check if the user is logged in and has the role of 'admin'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Fetch all products
$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle product deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    try {
        // Prepare delete query
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$delete_id]);

        // Redirect with success message
        echo "<script>alert('Product deleted successfully!'); window.location='manage_products.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - Admin</title>
    <link rel="stylesheet" href="manage_product.css">  
    <link rel="stylesheet" href="admin_dashboard.css">  
</head>
<body>
    <a href="logout.php" class="logout-btn">Logout</a>
    <!-- Sidebar -->
    <aside id="sidebar">
        <h3>Admin Dashboard</h3>
        <nav class="sidebar-nav">
            <ul>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="manageproduct.php">Manage Products</a></li>
                <li><a href="orders_list.php">Manage Orders</a></li> <!-- Link to Orders -->
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="manage_payments.php">Manage Payments</a></li> <!-- Added Manage Payments -->
                <li><a href="settings.php">Settings</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Content -->
    <section id="dashboard-content">
        <h1>Manage Products</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Image</th>  <!-- Added Image column -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($products) {
                    foreach ($products as $product) {
                        // Convert image to base64 encoding for displaying
                        $imageSrc = '';
                        if ($product['image']) {
                            $imageSrc = 'data:image/jpeg;base64,' . base64_encode($product['image']);
                        }

                        echo "<tr>
                            <td>{$product['id']}</td>
                            <td>{$product['title']}</td>
                            <td>{$product['category']}</td>
                            <td>{$product['price']}</td>
                            <td>{$product['stock']}</td>
                            <td>{$product['description']}</td>
                            <td><img src='{$imageSrc}' alt='{$product['title']}' width='100' height='100'></td> <!-- Displaying image -->
                            <td>
                                <a class='btn-edit' href='editproduct.php?id={$product['id']}'>Edit</a> |
                                <a class='btn-delete' href='manageproduct.php?delete_id={$product['id']}'>Delete</a> <!-- Delete button -->
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No products available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

</body>
</html>

