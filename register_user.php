<?php
include('db.php'); // database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirm-password'];
    $role     = $_POST['role']; // admin, seller, customer

    // Password check
    if ($password !== $confirm) {
        echo "<script>alert('Passwords do not match!'); window.location.href='register.php';</script>";
        exit();
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format!'); window.location.href='register.php';</script>";
        exit();
    }

    try {
        // Insert into database (backticks to avoid reserved keyword issue)
        $sql = "INSERT INTO `users` (`name`, `email`, `password`, `role`) 
                VALUES (:name, :email, :password, :role)";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':name'     => $name,
            ':email'    => $email,
            ':password' => $password,  // ⚠️ Plain text since you don’t want hashing
            ':role'     => $role
        ]);

        echo "<script>alert('Registration successful! Please login.'); window.location.href='login.php';</script>";

    } catch (PDOException $e) {
        echo "DB Error: " . $e->getMessage();
    }
}
?>
