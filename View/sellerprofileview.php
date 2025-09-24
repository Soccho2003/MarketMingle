<?php
include "db.php";
$result = $conn->query("SELECT * FROM sellerprofile WHERE id=1");
$profile = $result->fetch_assoc();
?>
<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="sellerprofileview.css">
</head>
<body>
  <div class="card">
    <h2>👤 Seller Profile View</h2>
    <?php if ($profile): ?>
      <div class="profile-item"><strong>Name:</strong> <?php echo $profile['name']; ?></div>
      <div class="profile-item"><strong>Email:</strong> <?php echo $profile['email']; ?></div>
      <div class="profile-item"><strong>Phone:</strong> <?php echo $profile['phone']; ?></div>
      <div class="profile-item"><strong>Shop Name:</strong> <?php echo $profile['shop_name']; ?></div>
      <div class="profile-item"><strong>Address:</strong> <?php echo $profile['address']; ?></div>
      <a href="sellerprofile.php" class="btn">Edit Profile</a>
    <?php else: ?>
      <p>No profile found. <a href="editsellerprofile.php" class="btn">Create Profile</a></p>
    <?php endif; ?>
    <a href="sellerdashboard.php" class="btn-link"><< Back to Dashboard</a>
  </div>
</body>
</html>
