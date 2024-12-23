<?php
include('header.php');
include('../server/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['product_name'];
    $category = $_POST['product_category'];  // Lấy danh mục từ dropdown
    $description = $_POST['product_description'];
    $price = $_POST['product_price'];
    $special_offer = isset($_POST['product_special_offer']) ? 1 : 0;
    $color = $_POST['product_color'];

    // Kiểm tra và xử lý ảnh
    $image_name = null;
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $image_tmp = $_FILES['product_image']['tmp_name'];
        $image_name = time() . '_' . basename($_FILES['product_image']['name']);
        $image_path = '../assets/imgs/' . $image_name;

        // Kiểm tra loại ảnh
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (in_array($_FILES['product_image']['type'], $allowed_types)) {
            // Kiểm tra kích thước ảnh (tối đa 5MB)
            if ($_FILES['product_image']['size'] <= 5 * 1024 * 1024) {
                move_uploaded_file($image_tmp, $image_path);
            } else {
                echo "Kích thước ảnh vượt quá giới hạn (5MB).";
                exit;
            }
        } else {
            echo "Chỉ chấp nhận ảnh JPEG, PNG, GIF và WebP.";
            exit;
        }
    }

    // Chèn dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO products (product_name, product_category, product_description, product_price, product_special_offer, product_color, product_image)
            VALUES ('$name', '$category', '$description', $price, $special_offer, '$color', '$image_name')";

    if ($conn->query($sql) === TRUE) {
        header('Location: products.php');
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>


<body>
    <?php include('sidemenu.php'); ?>
    <div class="content">
        <h1>Thêm sản phẩm mới</h1>
        <form method="POST" enctype="multipart/form-data">
            <label>Tên sản phẩm:</label>
            <input type="text" name="product_name" required><br>

            <label>Loại:</label>
            <select name="product_category" required>
                <option value="phones">Điện thoại</option>
                <option value="laptops">Laptop</option>
                <option value="headphones">Tai nghe</option>
                <option value="accessories">Phụ kiện</option>
            </select><br>

            <label>Mô tả:</label>
            <textarea name="product_description" required></textarea><br>

            <label>Giá:</label>
            <input type="number" name="product_price" required><br>

            <label>Khuyến mãi:</label>
            <input type="checkbox" name="product_special_offer"><br>

            <label>Màu sắc:</label>
            <input type="text" name="product_color" required><br>

            <label>Ảnh sản phẩm:</label>
            <input type="file" name="product_image" required><br>

            <button type="submit">Thêm sản phẩm</button>
        </form>


    </div>
</body>
</html>
