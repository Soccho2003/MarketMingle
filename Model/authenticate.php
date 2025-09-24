<?php
session_start();

// Include database connection
include('db.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the query to fetch user data based on email
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user exists and validate password using password_verify
    if ($user && password_verify($password, $user['password'])) {
        // Save user info in session
        $_SESSION['user_id']  = $user['id'];
        $_SESSION['username'] = $user['name'];
        $_SESSION['email']    = $user['email'];
        $_SESSION['role']     = $user['role'];

        // Set cookies if "Remember Me" is checked
        if (isset($_POST['remember_me'])) {
            // Set cookie to remember email and password for 30 days
            setcookie('user_email', $email, time() + (30 * 24 * 60 * 60), "/"); // 30 days
            setcookie('user_password', $password, time() + (30 * 24 * 60 * 60), "/");
        } else {
            // If remember me is not checked, delete cookies
            setcookie('user_email', '', time() - 3600, "/");
            setcookie('user_password', '', time() - 3600, "/");
        }

        // Role-based redirection
        if ($user['role'] === 'admin') {
            header("Location: ../View/admin_dashboard.php");
            exit();
        } elseif ($user['role'] === 'seller') {
            header("Location: ../View/sellerdashboard.php");
            exit();
        } elseif ($user['role'] === 'customer') {
            header("Location: ../View/customer_dashboard.php");
            exit();
        } else {
            echo "<script>alert('Role not recognized.'); window.location.href='../View/login.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password!'); window.location.href='../View/login.php';</script>";
    }
}
?>
