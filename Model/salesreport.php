<?php
include "db.php";

// Total Sales - Calculate total sales based on orders
$stmt = $pdo->query("SELECT SUM(total_price) AS total_sales FROM orders");
$total_sales_row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_sales = $total_sales_row['total_sales'] ?? 0;

// Total Orders - Get total count of orders
$stmt = $pdo->query("SELECT COUNT(*) AS total_orders FROM orders");
$total_orders_row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_orders = $total_orders_row['total_orders'] ?? 0;

// Best Selling Product - Fetch the product with the highest total sales
$stmt = $pdo->query("SELECT product_name, SUM(total_price) AS total_sales 
                     FROM orders 
                     GROUP BY product_name 
                     ORDER BY total_sales DESC LIMIT 1");
$top_product = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch all payments
$stmt = $pdo->query("SELECT * FROM payments");
$payments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>