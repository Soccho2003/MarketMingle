<?php
session_start();

// Check if the cart exists in the session
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<script>alert('Your cart is empty.'); window.location='../View/customer_dashboard.php';</script>";
    exit();
}

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../View/login.php');
    exit();
}

include('db.php');  // Include the database connection

// Initialize total price
$totalPrice = 0;

// Handle item deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Loop through the cart and remove the item with the matching ID
    foreach ($_SESSION['cart'] as $index => $item) {
        if ($item['product_id'] == $delete_id) {
            unset($_SESSION['cart'][$index]);
            break; // Stop once the item is removed
        }
    }

    // Re-index the array to prevent issues with gaps in the array keys
    $_SESSION['cart'] = array_values($_SESSION['cart']);

    // Redirect to view cart page after deletion
    header("Location: ../View/view_cart.php");
    exit();
}
?>