<?php
// Include the database connection
include('db.php');
?>

<head>
    <!-- Link to the products list CSS -->
    <link rel="stylesheet" href="products_list.css">  
</head>

<section id="products-list">
    <h2>Manage Products</h2>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $stmt = $pdo->query("SELECT * FROM products");
            while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$product['name']}</td>
                        <td>{$product['category']}</td>
                        <td>{$product['price']}</td>
                        <td>
                            <a href='edit_product.php?id={$product['id']}'>Edit</a> | 
                            <a href='delete_product.php?id={$product['id']}'>Delete</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</section>

<?php include('includes/footer.php'); ?>
