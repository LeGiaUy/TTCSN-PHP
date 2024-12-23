<?php
session_start();
include('header.php');
include('../server/connection.php');

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

// Check if order_id is provided in the URL
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Fetch the order details
    $stmt = $conn->prepare("SELECT order_id, order_status FROM orders WHERE order_id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($order_id, $order_status);
    $stmt->fetch();
} else {
    echo "Order ID is missing!";
    exit;
}

// Handle form submission to update the order status
if (isset($_POST['update_btn'])) {
    // Get the updated order status
    $order_status = $_POST['order_status'];

    // Ensure the value is sanitized
    $order_status = htmlspecialchars($order_status);

    // Prepare the update query
    $update_stmt = $conn->prepare("UPDATE orders SET order_status = ? WHERE order_id = ?");
    $update_stmt->bind_param("si", $order_status, $order_id);

    // Execute the query
    if ($update_stmt->execute()) {
        // Redirect on success with a success message
        header('Location: orders.php?success=Order status updated successfully!');
        exit;
    } else {
        // Handle error if update fails
        echo "Error updating order status: " . $update_stmt->error;
    }
}
?>

<body>
    <div class="content">
        <h1>Update Order Status</h1>
        <form action="edit_order.php?order_id=<?php echo $order_id; ?>" method="POST">
            <div class="form-group">
                <label for="order_status">Order Status</label>
                <select name="order_status" required>
                    <option value="Đã thanh toán" <?php echo ($order_status == 'Đã thanh toán') ? 'selected' : ''; ?>>Đã thanh toán</option>
                    <option value="Đang giao" <?php echo ($order_status == 'Đang giao') ? 'selected' : ''; ?>>Đang giao</option>
                    <option value="Đã giao" <?php echo ($order_status == 'Đã giao') ? 'selected' : ''; ?>>Đã giao</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="update_btn" value="Update Status">
            </div>
        </form>
    </div>
</body>
</html>
