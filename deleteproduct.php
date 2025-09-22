<?php
include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM products WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product Deleted Successfully');window.location='sellerdashboard.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "<script>alert('No product ID provided');window.location='sellerdashboard.php';</script>";
}
?>
