<?php
session_start();  // Start session for user authentication

// Include database connection
include("db.php");

// Check if the user is logged in and has the role of 'admin'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location:../View/ login.php");
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