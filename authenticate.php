<?php
session_start(); 


include('db.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['email']; 
    $password = $_POST['password']; 

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['password'] === $password) {
        // Save session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = isset($user['role']) ? $user['role'] : 'user';

    
        if (isset($_POST['remember_me'])) {
            
            setcookie("user_email", $email, time() + (86400 * 30), "/");
        } else {
            
            setcookie("user_email", "", time() - 3600, "/");
        }

        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "<script>alert('Invalid email or password.'); window.location.href = 'login.php';</script>";
    }
}
?>
