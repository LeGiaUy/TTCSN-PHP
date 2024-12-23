<?php
// Kết nối CSDL
include('header.php');
include('../server/connection.php');
// Lấy danh sách sản phẩm
$sql = "SELECT * FROM products ORDER BY product_id ASC";
$result = $conn->query($sql);
?>

<body>
    <?php include('sidemenu.php'); ?>
    <div class="content">
        <h1>Danh sách sản phẩm</h1>
        <a class="btn" href="add_product.php">Thêm sản phẩm mới</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Loại</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Khuyến mãi</th>
                <th>Màu sắc</th>
                <th>Thao tác</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['product_id'] ?></td>
                        <td><?= $row['product_name'] ?></td>
                        <td><?= $row['product_category'] ?></td>
                        <td><?= $row['product_description'] ?></td>
                        <td>
                            <img src="../assets/imgs/<?= $row['product_image'] ?>" alt="Hình ảnh" width="50">
                        </td>
                        <td><?= $row['product_price'] ?></td>
                        <td><?= $row['product_special_offer'] ? 'Có' : 'Không' ?></td>
                        <td><?= $row['product_color'] ?></td>
                        <td>
                            <a class="btn" href="edit_product.php?id=<?= $row['product_id'] ?>">Sửa</a>
                            <a class="btn btn-danger" href="delete_product.php?id=<?= $row['product_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="9">Không có sản phẩm nào</td></tr>
            <?php endif; ?>
        </table>
        
    </div>
</body>
</html>
