<?php
session_start();
include 'db_connection.php';

// Check if the admin is logged in (simple session check for this example)
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin-login.php");
    exit();
}

// Fetch all orders from the 'orders' table
$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - View Orders</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

<h1>Orders List</h1>
<table>
    <tr>
        <th>Order ID</th>
        <th>User ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Status</th>
        <th>Order Date</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['user_id']; ?></td>
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td><?php echo $row['order_date']; ?></td>
    </tr>
    <?php } ?>

</table>

</body>
</html>
