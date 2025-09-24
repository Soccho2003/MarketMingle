<?php
session_start(); // Start session for user authentication
include('header.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Market Mingle</title>
    <link rel="stylesheet" href="login.css"> <!-- Link to login.css -->
</head>
<body>

    <!-- Login Section -->
    <section id="login-section">
        <h2>Login to Your Account</h2>
        <form action="authenticate.php" method="POST" class="login-form">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" 
                   value="<?php echo isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : ''; ?>" 
                   required placeholder="Enter your email">
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" 
                   value="<?php echo isset($_COOKIE['user_password']) ? $_COOKIE['user_password'] : ''; ?>" 
                   required placeholder="Enter your password">
            
            <!-- Remember Me checkbox -->
            <label>
                <input type="checkbox" name="remember_me" 
                       <?php echo isset($_COOKIE['user_email']) ? 'checked' : ''; ?>> Remember Me
            </label>
            
            <button type="submit" class="login-btn">Login</button>
            
            <div class="signup-link">
                <p>Don't have an account? <a href="register.php">Register here</a></p>
            </div>
        </form>
    </section>

    <?php include('footer.php'); ?>

</body>
</html>
