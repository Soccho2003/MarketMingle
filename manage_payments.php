<?php
session_start();

// Include the database connection
include('db.php');

// Check if the user is logged in and has the role of 'admin'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Handle payment deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    try {
        // Prepare delete query
        $stmt = $pdo->prepare("DELETE FROM payments WHERE id = ?");
        $stmt->execute([$delete_id]);

        echo "<script>alert('Payment deleted successfully!'); window.location='manage_payments.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Fetch all payment details
$stmt = $pdo->prepare("SELECT * FROM payments");
$stmt->execute();
$payments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Payments - Admin</title>
    <link rel="stylesheet" href="manage_payments.css">  
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

    <section id="manage-payments">
        <div class="container">
            <h1>Manage Payments</h1>

            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Actions</th>
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
                                <td>BDT {$payment['amount']}</td>
                                <td>
                                    <a class='btn-delete' href='manage_payments.php?delete_id={$payment['id']}'>Delete</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No payments available</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <?php include('footer.php'); ?> <!-- Include footer -->
</body>
</html>
