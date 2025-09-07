<?php include('includes/header.php'); ?>

<!-- Link to Orders List CSS -->
<head>
    <link rel="stylesheet" href="orders_list.css">  <!-- Correct path to the CSS file -->
</head>

<section id="orders-list">
    <h2>Manage Orders</h2>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Status</th>
                <th>Total Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Order Data (hardcoded for now) -->
            <tr>
                <td>#1001</td>
                <td>soc</td>
                <td>Shipped</td>
                <td>BDT 500.00</td>
                <td>
                    <a href="#">View</a> | 
                    <a href="#">Cancel</a>
                </td>
            </tr>
            <tr>
                <td>#1002</td>
                <td>sohom</td>
                <td>Pending</td>
                <td>BDT 700.00</td>
                <td>
                    <a href="#">View</a> | 
                    <a href="#">Cancel</a>
                </td>
            </tr>
            <tr>
                <td>#1003</td>
                <td>raiyan</td>
                <td>Completed</td>
                <td>BDT 300.00</td>
                <td>
                    <a href="#">View</a> | 
                    <a href="#">Cancel</a>
                </td>
            </tr>
        </tbody>
    </table>
</section>

<?php include('includes/footer.php'); ?>
