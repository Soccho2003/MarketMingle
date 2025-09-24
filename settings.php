<?php
session_start();  // Start session for user authentication

// Include database connection
include("db.php");

// Check if the user is logged in and has the role of 'admin'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Fetch settings (site_name, currency, theme)
$stmt = $pdo->prepare("SELECT * FROM settings WHERE `key` = 'site_name'");
$stmt->execute();
$siteName = $stmt->fetch(PDO::FETCH_ASSOC)['value'];  // Fetch site name

$stmt = $pdo->prepare("SELECT * FROM settings WHERE `key` = 'currency'");
$stmt->execute();
$currency = $stmt->fetch(PDO::FETCH_ASSOC)['value'];  // Fetch currency

$stmt = $pdo->prepare("SELECT * FROM settings WHERE `key` = 'theme'");
$stmt->execute();
$theme = $stmt->fetch(PDO::FETCH_ASSOC)['value'];  // Fetch theme

// Handle form submission and updating settings
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $site_name = isset($_POST['site_name']) ? $_POST['site_name'] : '';
    $currency = isset($_POST['currency']) ? $_POST['currency'] : '';
    $theme = isset($_POST['theme']) ? $_POST['theme'] : '';

    // Update the settings table with the new values
    $updateStmt = $pdo->prepare("UPDATE settings SET value = ? WHERE `key` = 'site_name'");
    $updateStmt->execute([$site_name]);
    
    $updateStmt = $pdo->prepare("UPDATE settings SET value = ? WHERE `key` = 'currency'");
    $updateStmt->execute([$currency]);
    
    $updateStmt = $pdo->prepare("UPDATE settings SET value = ? WHERE `key` = 'theme'");
    $updateStmt->execute([$theme]);

    echo "<script>alert('Settings updated successfully!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Settings</title>
    <link rel="stylesheet" href="admin_dashboard.css"> 
    <link rel="stylesheet" href="settings.css">  <!-- External CSS file for styling -->
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

    <section id="settings">
        <div class="container">
            <h1>Admin Settings</h1>

            <form method="POST" action="settings.php">
                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" id="site_name" name="site_name" value="<?php echo $siteName; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="currency">Currency</label>
                    <input type="text" id="currency" name="currency" value="<?php echo $currency; ?>" required>
                </div>

                <div class="form-group">
                    <label for="theme">Theme</label>
                    <input type="text" id="theme" name="theme" value="<?php echo $theme; ?>" required>
                </div>

                <button type="submit">Save Changes</button>
            </form>
        </div>
    </section>
</body>
</html>
