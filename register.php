<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Market Mingle</title>
    <link rel="stylesheet" href="register.css"> <!-- Link to register.css -->
</head>
<body>
    <?php include('includes/header.php'); ?>

    <!-- Register Section -->
    <section id="register-section">
        <h2>Create Your Account</h2>
        <form action="register_user.php" method="POST" class="register-form">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required placeholder="Enter your full name">
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email">
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">
            
            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" required placeholder="Confirm your password">
            
            <button type="submit" class="register-btn">Register</button>
            
            <div class="login-link">
                <p>Already have an account? <a href="login.php">Login here</a></p>
            </div>
        </form>
    </section>

    <?php include('includes/footer.php'); ?>
</body>
</html>
