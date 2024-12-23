<?php
// Start session
session_start();

// Include the header file and connection
include('header.php');
include('../server/connection.php');

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

// Prepare and execute the query to fetch orders from the database
$stmt = $conn->prepare("SELECT order_id, order_cost, order_status, user_id, user_phone, user_city, user_address, order_date FROM orders");

if (!$stmt) {
    die("Query preparation failed: " . $conn->error);
}

$stmt->execute();
$orders = $stmt->get_result();
?>

<body>
    <?php include('sidemenu.php'); ?>

    <!-- Content -->
    <div class="content">
        <h1>Orders</h1>
        
        <!-- Display orders in a table -->
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Cost</th>
                    <th>Order Status</th>
                    <th>User ID</th>
                    <th>User Phone</th>
                    <th>User City</th>
                    <th>User Address</th>
                    <th>Order Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any orders
                if ($orders->num_rows > 0) {
                    while ($order = $orders->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $order['order_id'] . "</td>";
                        echo "<td>" . $order['order_cost'] . "</td>";
                        echo "<td>" . $order['order_status'] . "</td>";
                        echo "<td>" . $order['user_id'] . "</td>";
                        echo "<td>" . $order['user_phone'] . "</td>";
                        echo "<td>" . $order['user_city'] . "</td>";
                        echo "<td>" . $order['user_address'] . "</td>";
                        echo "<td>" . $order['order_date'] . "</td>";
                        echo "<td><a href='edit_order.php?order_id=" . $order['order_id'] . "'>Edit</a> | <a href='delete_order.php?order_id=" . $order['order_id'] . "'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>No orders found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
