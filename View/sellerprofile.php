<?php
include "db.php";

// Create seller_profile table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS sellerprofile (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    shop_name VARCHAR(100),
    address TEXT
)");

// Fetch profile (assuming only 1 seller for demo)
$result = $conn->query("SELECT * FROM sellerprofile WHERE id=1");
$profile = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $shop_name = $_POST['shop_name'];
    $address = $_POST['address'];

    if ($profile) {
        // Update existing
        $sql = "UPDATE sellerprofile 
                SET name='$name', email='$email', phone='$phone', shop_name='$shop_name', address='$address' 
                WHERE id=1";
    } else {
        // Insert new
        $sql = "INSERT INTO sellerprofile (id, name, email, phone, shop_name, address) 
                VALUES (1, '$name', '$email', '$phone', '$shop_name', '$address')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Profile Updated Successfully');window.location='sellerprofile.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Seller Profile</title>
  <link rel="stylesheet" href="sellerprofile.css">
</head>
<body>
  <div class="card">
    <h2>Seller Profile</h2>
    <form method="post">
      <input type="text" name="name" placeholder="Full Name" value="<?php echo $profile['name'] ?? ''; ?>" required>
      <input type="email" name="email" placeholder="Email" value="<?php echo $profile['email'] ?? ''; ?>" required>
      <input type="text" name="phone" placeholder="Phone" value="<?php echo $profile['phone'] ?? ''; ?>" required>
      <input type="text" name="shop_name" placeholder="Shop Name" value="<?php echo $profile['shop_name'] ?? ''; ?>" required>
      <textarea name="address" placeholder="Shop Address"><?php echo $profile['address'] ?? ''; ?></textarea>
      <button type="submit">Save Profile</button>
    </form>
    <a href="sellerdashboard.php"> << Back to Dashboard</a>
  </div>
</body>
</html>
