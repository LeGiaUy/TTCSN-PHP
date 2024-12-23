<?php

session_start();

include('connection.php');

if (isset($_GET['transaction_id']) && isset($_GET['order_id'])) {
    
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $order_id = $_GET['order_id'];
    $order_status = "Đã thanh toán";
    $transaction_id = $_GET['transaction_id'];
    $user_id = $_SESSION['user_id'];
    $payment_date = date('Y-m-d H:i:s');

    // Thay đổi trạng thái đơn hàng thành "Đã thanh toán"
    $stmt = $conn->prepare("UPDATE orders SET order_status=? WHERE order_id=?");
    if (!$stmt) {
        die("Prepare statement failed: " . $conn->error);
    }
    $stmt->bind_param('si', $order_status, $order_id);

    if (!$stmt->execute()) {
        die("Execution failed: " . $stmt->error);
    }

    // Lưu thông tin thanh toán
    $stmt1 = $conn->prepare("INSERT INTO payments (order_id, user_id, transaction_id, payment_date) VALUES (?, ?, ?,?)");
    if (!$stmt1) {
        die("Prepare statement failed: " . $conn->error);
    }
    $stmt1->bind_param('iiss', $order_id, $user_id, $transaction_id, $payment_date);

    if (!$stmt1->execute()) {
        die("Execution failed: " . $stmt1->error);
    }

    // Chuyển hướng đến trang tài khoản người dùng
    header("location: ../account.php?payment_message=Đã thanh toán thành công, cảm ơn đã sử dụng dịch vụ của chúng tôi");
    exit;
} else {
    header("location: index.php");
    exit;
}
?>
