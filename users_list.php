<?php include('includes/header.php'); ?>

<!-- Link to the users list CSS -->
<head>
    <link rel="stylesheet" href="users_list.css">  <!-- Correct path to the CSS file -->
</head>

<section id="users-list">
    <h2>Manage Users</h2>
    <table>
        <thead>
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example User Data (hardcoded for now) -->
            <tr>
                <td>Admin User</td>
                <td>admin@gmail.com</td>
                <td>Admin</td>
                <td>
                    <a href="#">Edit</a> | 
                    <a href="#">Delete</a>
                </td>
            </tr>
            <tr>
                <td>Soccho</td>
                <td>soc@gmail.com</td>
                <td>Customer</td>
                <td>
                    <a href="#">Edit</a> | 
                    <a href="#">Delete</a>
                </td>
            </tr>
            <tr>
                <td>Monibur</td>
                <td>moniburr@gmail.com</td>
                <td>Seller</td>
                <td>
                    <a href="#">Edit</a> | 
                    <a href="#">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</section>

<?php include('includes/footer.php'); ?>
