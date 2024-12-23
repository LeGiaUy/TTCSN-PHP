<?php
include('../server/connection.php');

// Kiểm tra nếu có ID sản phẩm
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Truy vấn để lấy tên ảnh của sản phẩm cần xóa
    $sql = "SELECT product_image FROM products WHERE product_id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Lấy tên ảnh
        $row = $result->fetch_assoc();
        $image_name = $row['product_image'];

        // Xóa sản phẩm khỏi cơ sở dữ liệu
        $sql_delete = "DELETE FROM products WHERE product_id = $product_id";
        if ($conn->query($sql_delete) === TRUE) {
            // Xóa ảnh khỏi thư mục
            $image_path = '../assets/imgs/' . $image_name;
            if (file_exists($image_path)) {
                unlink($image_path); // Xóa ảnh nếu tồn tại
            }

            // Chuyển hướng về trang danh sách sản phẩm
            header('Location: products.php');
        } else {
            echo "Lỗi: " . $conn->error;
        }
    } else {
        echo "Không tìm thấy sản phẩm.";
    }
} else {
    echo "ID sản phẩm không hợp lệ.";
}
?>
