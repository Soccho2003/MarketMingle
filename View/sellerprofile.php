<?php
include ('../Model/sellerprofile.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Profile</title>
    <link rel="stylesheet" href="sellerprofile.css">
</head>
<body>


     <a href="logout.php" class="logout-btn">Logout</a>
    <a href="../View/sellerdashboard.php" class="back-btn">Back</a>
    <div class="card">
        <h2>Seller Profile</h2>
        <form method="post">
            <!-- Show current profile info -->
            <input type="text" name="name" placeholder="Full Name" value="<?php echo $user['name'] ?? ''; ?>" required>
            <input type="email" name="email" placeholder="Email" value="<?php echo $user['email'] ?? ''; ?>" required>
            
            <!-- Password Fields for changing the password -->
            <input type="password" name="new_password" placeholder="New Password">
            <input type="password" name="confirm_password" placeholder="Confirm Password">
            
            <button type="submit">Save Profile</button>
        </form>
    </div>

</body>
</html>
