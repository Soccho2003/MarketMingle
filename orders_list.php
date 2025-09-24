<?php
session_start();  // Start session for user authentication

// Include database connection
include('db.php');

// Check if the user is logged in and has the role of 'admin'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Fetch all orders from the database
$stmt = $pdo->prepare("SELECT * FROM orders");
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle product deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    try {
        // Prepare delete query
        $stmt = $pdo->prepare("DELETE FROM orders WHERE id = ?");
        $stmt->execute([$delete_id]);

        // Redirect with success message
        echo "<script>alert('Order deleted successfully!'); window.location='orders_list.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Handle status update
if (isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['status'];

    try {
        // Update the order status in the database
        $stmt = $pdo->prepare("UPDATE orders SET status = ? WHERE id = ?");
        $stmt->execute([$new_status, $order_id]);

        // Redirect with success message
        echo "<script>alert('Order status updated successfully!'); window.location='orders_list.php';</script>";
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
    <title>Manage Orders - Admin</title>
    <link rel="stylesheet" href="admin_dashboard.css"> 
    <link rel="stylesheet" href="orders_list.css">  <!-- External CSS file for styling -->
    
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

    <section id="manage-orders">
        <div class="container">
            <h1>Manage Orders</h1>

            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>User ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($orders) {
                        foreach ($orders as $order) {
                            echo "<tr>
                                <td>{$order['id']}</td>
                                <td>{$order['user_id']}</td>
                                <td>{$order['product_name']}</td>
                                <td>BDT {$order['price']}</td>
                                <td>{$order['order_date']}</td>
                                <td>
                                    <form method='POST'>
                                        <select name='status' onchange='this.form.submit()'>
                                            <option value='pending' " . ($order['status'] == 'pending' ? 'selected' : '') . ">Pending</option>
                                            <option value='completed' " . ($order['status'] == 'completed' ? 'selected' : '') . ">Completed</option>
                                            <option value='shipped' " . ($order['status'] == 'shipped' ? 'selected' : '') . ">Shipped</option>
                                        </select>
                                        <input type='hidden' name='order_id' value='{$order['id']}'>
                                        <input type='hidden' name='update_status' value='1'>
                                    </form>
                                </td>
                                <td>
                                    <a class='btn-delete' href='orders_list.php?delete_id={$order['id']}'>Delete</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No orders available</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

</body>
</html>
