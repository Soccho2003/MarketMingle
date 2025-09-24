<?php
session_start();

// Check if the user is logged in and has the role of 'seller'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'seller') {
    header("Location: ../View/login.php");
    exit();
}

// Include database connection
include("db.php");

// Fetch user data for editing
$user_id = $_SESSION['user_id']; // Assuming user ID is stored in session

// Fetch user from the database
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Update user data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // If password fields are filled, update the password
    if (!empty($new_password) && !empty($confirm_password)) {
        if ($new_password === $confirm_password) {
            // Hash new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            
            // Update password
            $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?");
            $stmt->execute([$name, $email, $hashed_password, $user_id]);

            echo "<script>alert('Profile and password updated successfully!'); window.location='../View/sellerprofile.php';</script>";
        } else {
            echo "<script>alert('Passwords do not match!');</script>";
        }
    } else {
        // Update profile without password change
        $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->execute([$name, $email, $user_id]);

        echo "<script>alert('Profile updated successfully!'); window.location='../View/sellerprofile.php';</script>";
    }
}
?>