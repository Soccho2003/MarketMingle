<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Market Mingle</title>
    <link rel="stylesheet" href="admin_dashboard.css"> 
</head>
<body>
    
    <!-- Logout Button -->
    <a href="logout.php" class="logout-btn">Logout</a>

    <section id="admin-dashboard">
        <div class="dashboard-container">
            <aside id="sidebar">
                <h3>Admin Dashboard</h3>
                <nav class="sidebar-nav">
                    <ul>
                        <li><a href="#dashboard">Dashboard</a></li>
                        <li><a href="manageproduct.php">Manage Products</a></li>
                        <li><a href="orders_list.php">Manage Orders</a></li> <!-- Link to Orders -->
                        <li><a href="manage_users.php">Manage Users</a></li>
                        <li><a href="manage_payments.php">Manage Payments</a></li> <!-- Added Manage Payments -->
                        <li><a href="settings.php">Settings</a></li>
                    </ul>
                </nav>
            </aside>

            <div id="dashboard-content">
                <section id="dashboard">
                    <h2>Welcome, Admin!</h2>
                    <div class="dashboard-cards">
                        <div class="card" onclick="window.location.href='manageproduct.php'">
                            <h4>Total Products</h4>
                            <p>150</p>
                        </div>

                        <div class="card" onclick="window.location.href='manage_users.php'">
                            <h4>Total Users</h4>
                            <p>1200</p>
                        </div>

                        <!-- Total Orders Card (Click to Manage Orders) -->
                        <div class="card" onclick="window.location.href='orders_list.php'">
                            <h4>Total Orders</h4>
                            <p>350</p>
                        </div>

                        <!-- Manage Payments Card (Click to Manage Payments) -->
                        <div class="card" onclick="window.location.href='manage_payments.php'">
                            <h4>Total Payments</h4>
                            <p>100</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

</body>
</html>
