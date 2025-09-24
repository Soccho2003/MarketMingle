<?php
include('db.php');

$stmt = $pdo->query("SELECT * FROM products WHERE seller_id = {$_SESSION['user_id']}");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>