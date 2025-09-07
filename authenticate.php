<?php
// Simulate authentication (no database yet, hardcoded credentials)
$correct_email = "admin@gmail.com";
$correct_password = "admin123";

// Get form values from POST
$email = $_POST['email'];
$password = $_POST['password'];

// Check if credentials match
if ($email == $correct_email && $password == $correct_password) {
    // Redirect to the Admin Dashboard if login is successful
    header("Location: admin_dashboard.php");
    exit;
} else {
    // If credentials don't match, show an error
    echo "<script>alert('Invalid credentials. Please try again.'); window.location.href='login.php';</script>";
}
?>
