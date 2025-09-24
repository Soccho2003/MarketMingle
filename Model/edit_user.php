<?php
session_start();  // Start session for user authentication

// Include database connection
include("db.php");

// Check if the user is logged in and has the role of 'admin'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location:../View/login.php");
    exit();
}

// Fetch user data for editing
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user from the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Update user data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $role  = $_POST['role'];

    // Update user details
    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, role = ? WHERE id = ?");
    $stmt->execute([$name, $email, $role, $user_id]);

    echo "<script>alert('User updated successfully!'); window.location='../View/manage_users.php';</script>";
}
?>