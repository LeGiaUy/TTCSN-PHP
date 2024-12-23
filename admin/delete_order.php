<?php
session_start();
include('../server/connection.php');

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

// Check if order_id is provided in the URL
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Prepare the query to delete the order
    $stmt = $conn->prepare("DELETE FROM orders WHERE order_id = ?");
    $stmt->bind_param("i", $order_id);

    // Execute the query
    if ($stmt->execute()) {
        header('Location: orders.php?success=Order deleted successfully!');
    } else {
        echo "Error deleting order!";
    }
} else {
    echo "Order ID is missing!";
}
?>
