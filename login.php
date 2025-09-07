<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Market Mingle</title>
    <link rel="stylesheet" href="login.css"> <!-- Link to login.css -->
</head>
<body>
    <?php include('includes/header.php'); ?>
    
    <!-- Login Section -->
    <section id="login-section">
        <h2>Login to Your Account</h2>
        <form action="authenticate.php" method="POST" class="login-form">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email">
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">
            
            <button type="submit" class="login-btn">Login</button>
            
            <div class="signup-link">
                <p>Don't have an account? <a href="register.php">Register here</a></p>
            </div>
        </form>
    </section>

    <?php include('includes/footer.php'); ?>
</body>
</html>
