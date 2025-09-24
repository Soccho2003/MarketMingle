<?php
include "db.php";
session_start();

// if logged in, redirect to dashboard
if (isset($_SESSION['seller_id'])) {
    header("Location: sellerdashboard.php");
    exit();
}

$error = "";
$savedEmail = $_COOKIE['seller_email'] ?? "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password']; 

    //seller authentication 
    $sql = "SELECT * FROM sellerprofile WHERE email='$email' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $seller = $result->fetch_assoc();

        //demo, password = phone number should replace with proper hashing
        if ($password == $seller['phone']) {
            $_SESSION['seller_id'] = $seller['id'];
            $_SESSION['seller_name'] = $seller['name'];

            // if remember me store email in cookie
            if (!empty($_POST['remember'])) {
                setcookie("seller_email", $email, time() + (10 * 1), "/");
            }

            header("Location: sellerdashboard.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Seller not found.";
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Seller Login</title>
  <link rel="stylesheet" href="sellerlogin.css">
</head>
<body>
  <div class="card">
    <h2>Seller Login</h2>
    <?php if ($error): ?>
      <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>
    <form method="post">
      <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($savedEmail) ?>" required>
      <input type="password" name="password" placeholder="Password" required>
      <label>
        <input type="checkbox" name="remember"> Remember Me
      </label>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
