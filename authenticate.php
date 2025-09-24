<?php
session_start();  // Start the session for user authentication

// Include the database connection
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
        // Regenerate session ID to prevent session fixation
        session_regenerate_id(true);

        // Save user info in session
        $_SESSION['user_id']  = $user['id'];
        $_SESSION['username'] = $user['name'];
        $_SESSION['email']    = $user['email'];
        $_SESSION['role']     = $user['role'];

        // Redirect based on the user role
        switch ($user['role']) {
            case 'admin':
                header("Location: admin_dashboard.php");
                break;
            case 'seller':
                header("Location: sellerdashboard.php");
                break;
            case 'customer':
                header("Location: customer_dashboard.php");
                break;
            default:
                echo "<script>alert('Role not recognized.'); window.location.href='login.php';</script>";
                break;
        }
        exit();
    } else {
        echo "<script>alert('Invalid email or password!'); window.location.href='login.php';</script>";
    }
}
?>
