<?php
include('db.php'); // Include database connection

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

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.'); window.location.href='register.php';</script>";
        exit();
    }

    // Check if the email is already registered
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        echo "<script>alert('Email is already registered.'); window.location.href='register.php';</script>";
        exit();
    }

    // Insert the plain password into the database for testing (Do not do this in production!)
    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $password]); // Store plain password here (ONLY for testing)

        // Redirect to the login page after successful registration
        echo "<script>alert('Registration successful! Please login.'); window.location.href='login.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!-- Registration Form -->
<form action="register.php" method="POST">
    <label for="name">Full Name:</label>
    <input type="text" name="name" required placeholder="Enter your full name">

    <label for="email">Email:</label>
    <input type="email" name="email" required placeholder="Enter your email">

    <label for="password">Password:</label>
    <input type="password" name="password" required placeholder="Enter your password">

    <label for="confirm-password">Confirm Password:</label>
    <input type="password" name="confirm-password" required placeholder="Confirm your password">

    <button type="submit">Register</button>
</form>
