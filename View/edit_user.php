<?php
include ('../Model/edit_user.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="admin_dashboard.css">
    <link rel="stylesheet" href="edit_user.css">  <!-- External CSS file for styling -->
</head>
<body>
    <a href="logout.php" class="logout-btn">Logout</a>

    <section id="admin-dashboard">
        <div class="dashboard-container">
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

    <section id="edit-user">
        <div class="container">
            <h1>Edit User</h1>

            <form method="POST">
                <input type="text" name="name" value="<?php echo $user['name']; ?>" required placeholder="Full Name">
                <input type="email" name="email" value="<?php echo $user['email']; ?>" required placeholder="Email">
                <select name="role">
                    <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                    <option value="seller" <?php if ($user['role'] == 'seller') echo 'selected'; ?>>Seller</option>
                    <option value="customer" <?php if ($user['role'] == 'customer') echo 'selected'; ?>>Customer</option>
                </select>
                <button type="submit">Update User</button>
            </form>
        </div>
    </section>

</body>
</html>
