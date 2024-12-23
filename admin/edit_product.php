<?php
include('header.php');
include('../server/connection.php');

// Lấy sản phẩm
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); // 'i' chỉ kiểu dữ liệu int
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['product_name'];
    $category = $_POST['product_category'];
    $description = $_POST['product_description'];
    $price = $_POST['product_price'];
    $special_offer = isset($_POST['product_special_offer']) ? 1 : 0;
    $color = $_POST['product_color'];

    // Xử lý tải ảnh
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "../assets/imgs/";
        $file_name = basename($_FILES['product_image']['name']);
        $target_file = $target_dir . $file_name;

        // Kiểm tra định dạng file
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (!in_array($image_file_type, $allowed_types)) {
            die("Chỉ chấp nhận các tệp hình ảnh: JPG, JPEG, PNG, GIF, WEBP.");
        }

        // Kiểm tra dung lượng file (tối đa 2MB)
        if ($_FILES['product_image']['size'] > 2 * 1024 * 1024) {
            die("Dung lượng file không được vượt quá 2MB.");
        }

        // Đổi tên file để tránh trùng lặp
        $file_name = uniqid() . '.' . $image_file_type;
        $target_file = $target_dir . $file_name;

        // Di chuyển file vào thư mục
        if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) {
            // Xóa ảnh cũ nếu có ảnh mới
            if (file_exists("../assets/imgs/" . $product['product_image'])) {
                unlink("../assets/imgs/" . $product['product_image']);
            }
            $image_name = $file_name; // Lưu tên file mới
        } else {
            die("Lỗi khi tải ảnh lên.");
        }
    } else {
        $image_name = $product['product_image']; // Giữ nguyên ảnh cũ nếu không có ảnh mới
    }

    // Cập nhật cơ sở dữ liệu bằng prepared statement
    $sql = "UPDATE products SET 
            product_name = ?, 
            product_category = ?, 
            product_description = ?, 
            product_price = ?, 
            product_special_offer = ?, 
            product_color = ?, 
            product_image = ?
            WHERE product_id = ?";

    $stmt = $conn->prepare($sql);
    // 'ssssdisi' là kiểu dữ liệu cho các tham số
    $stmt->bind_param("ssssdssi", $name, $category, $description, $price, $special_offer, $color, $image_name, $id);

    if ($stmt->execute()) {
        header('Location: products.php');
    } else {
        echo "Lỗi: " . $stmt->error;
    }
}
?>



<body>
    <?php include('sidemenu.php'); ?>
    <div class="content">
        <h1>Sửa sản phẩm</h1>
        <form method="POST" enctype="multipart/form-data">
            <label>Tên sản phẩm:</label>
            <input type="text" name="product_name" value="<?= $product['product_name'] ?>" required><br>

            <label>Loại:</label>
            <select name="product_category" required>
                <option value="phones" <?= $product['product_category'] == 'phones' ? 'selected' : '' ?>>Điện thoại</option>
                <option value="laptops" <?= $product['product_category'] == 'laptops' ? 'selected' : '' ?>>Laptop</option>
                <option value="headphones" <?= $product['product_category'] == 'headphones' ? 'selected' : '' ?>>Tai nghe</option>
                <option value="accessories" <?= $product['product_category'] == 'accessories' ? 'selected' : '' ?>>Phụ kiện</option>
            </select><br>

            <label>Mô tả:</label>
            <textarea name="product_description" required><?= $product['product_description'] ?></textarea><br>

            <label>Giá:</label>
            <input type="number" name="product_price" value="<?= $product['product_price'] ?>" required><br>

            <label>Khuyến mãi:</label>
            <input type="checkbox" name="product_special_offer" <?= $product['product_special_offer'] ? 'checked' : '' ?>><br>

            <label>Màu sắc:</label>
            <input type="text" name="product_color" value="<?= $product['product_color'] ?>" required><br>

            <label>Hình ảnh hiện tại:</label><br>
            <img src="../assets/imgs/<?= $product['product_image'] ?>" alt="Hình ảnh hiện tại" width="100"><br>

            <label>Thay đổi hình ảnh:</label>
            <input type="file" name="product_image" accept="image/*"><br>

            <button type="submit">Cập nhật</button>
        </form>



    </div>
</body>
</html>
