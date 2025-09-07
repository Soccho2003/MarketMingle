<?php
include('db.php'); // Include the database connection

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Validate that passwords match
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match.'); window.location.href='register.php';</script>";
        exit();
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $hashedPassword]);

        // Redirect to the login page after successful registration
        echo "<script>alert('Registration successful! Please login.'); window.location.href='login.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
