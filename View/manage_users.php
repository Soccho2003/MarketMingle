<?php
include ('../Model/manage_users.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - Admin</title>
    <link rel="stylesheet" href="admin_dashboard.css"> 
    <link rel="stylesheet" href="manage_user.css"> 
     
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

    <section id="manage-users">
        <div class="container">
            <h1>Manage Users</h1>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($users) {
                        foreach ($users as $user) {
                            echo "<tr>
                                <td>{$user['id']}</td>
                                <td>{$user['name']}</td>
                                <td>{$user['email']}</td>
                                <td>{$user['role']}</td>
                                <td>
                                    <a class='btn-edit' href='edit_user.php?id={$user['id']}'>Edit</a> |
                                    <a class='btn-delete' href='manage_users.php?delete_id={$user['id']}'>Delete</a> <!-- Delete button -->
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No users available</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

</body>
</html>
