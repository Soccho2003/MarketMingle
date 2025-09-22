<?php
include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM vouchers WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Voucher deleted successfully!');window.location='sellerdashboard.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "<script>alert('No voucher selected!');window.location='sellerdashboard.php';</script>";
}
?>
