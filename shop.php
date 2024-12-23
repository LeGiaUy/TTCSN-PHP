<?php
include('server/connection.php');

// Biến mặc định cho danh mục và từ khóa tìm kiếm
$category = 'all';
$search_query = '';

// Kiểm tra nếu người dùng gửi form tìm kiếm
if (isset($_POST['search'])) {
    $category = $_POST['category']; // Lấy giá trị danh mục từ form
    $search_query = $_POST['search_query']; // Lấy từ khóa tìm kiếm

    // Nếu tìm kiếm theo tên sản phẩm và chọn danh mục
    if ($category == 'all' && !empty($search_query)) {
        $stmt = $conn->prepare("SELECT * FROM products WHERE product_name LIKE ?");
        $search_query_param = "%$search_query%"; // Thêm ký tự % cho tìm kiếm theo chuỗi
        $stmt->bind_param("s", $search_query_param);
        $stmt->execute();
        $products = $stmt->get_result();
    }
    // Nếu tìm kiếm theo danh mục và có từ khóa tìm kiếm
    else if ($category != 'all' && !empty($search_query)) {
        $stmt = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_name LIKE ?");
        $search_query_param = "%$search_query%"; // Thêm ký tự % cho tìm kiếm theo chuỗi
        $stmt->bind_param("ss", $category, $search_query_param);
        $stmt->execute();
        $products = $stmt->get_result();
    }
    // Nếu chỉ tìm kiếm theo danh mục
    else if ($category != 'all') {
        $stmt = $conn->prepare("SELECT * FROM products WHERE product_category=?");
        $stmt->bind_param("s", $category);
        $stmt->execute();
        $products = $stmt->get_result();
    }
    // Nếu không có tìm kiếm theo tên hoặc danh mục
    else {
        $stmt = $conn->prepare("SELECT * FROM products");
        $stmt->execute();
        $products = $stmt->get_result();
    }
} else {
    // Truy vấn mặc định
    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    $products = $stmt->get_result();
}
?>

<?php include('layouts/header.php') ?>

<div id="product-page">
    <!-- Search Section -->
    <section id="search">
        <div class="container">
            <p>Tìm kiếm</p>
            <hr>
        </div>
        
        <form class="row mx-auto container" action="shop.php" method="POST">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <p>Danh mục</p>
                <!-- Các lựa chọn danh mục -->
                <div class="form-check">
                    <input class="form-check-input" value="all" type="radio" name="category" id="category_all" <?php if ($category == 'all') echo 'checked'; ?>>
                    <label class="form-check-label" for="category_all">Tất cả</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="phones" type="radio" name="category" id="category_phones" <?php if ($category == 'phones') echo 'checked'; ?>>
                    <label class="form-check-label" for="category_phones">Điện thoại</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="laptops" type="radio" name="category" id="category_laptops" <?php if ($category == 'laptops') echo 'checked'; ?>>
                    <label class="form-check-label" for="category_laptops">Laptops</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="headphones" type="radio" name="category" id="category_headphones" <?php if ($category == 'headphones') echo 'checked'; ?>>
                    <label class="form-check-label" for="category_headphones">Tai nghe</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="accessories" type="radio" name="category" id="category_accessories" <?php if ($category == 'accessories') echo 'checked'; ?>>
                    <label class="form-check-label" for="category_accessories">Phụ kiện</label>
                </div>

                <!-- Tìm kiếm theo tên sản phẩm -->
                <div class="form-group my-3 mx-3">
                    <label for="search_query">Tìm kiếm theo tên sản phẩm</label>
                    <!-- Không hiển thị ký tự % trong input -->
                    <input type="text" name="search_query" id="search_query" value="<?php echo htmlspecialchars($search_query); ?>" class="form-control">
                </div>
            </div>

            <div class="form-group my-3 mx-3">
                <input type="submit" name="search" value="Tìm kiếm" class="btn btn-primary">
            </div>
        </form>
    </section>

    <!-- Products -->
    <section id="shop" class="my-5 py-5">
        <div class="container mt-5 py-5">
            <h3>Sản phẩm</h3>
            <hr>
            <p>Ở đây bạn có thể xem những sản phẩm của chúng tôi</p>
        </div>
        <div class="row mx-auto container">
            <?php while ($row = $products->fetch_assoc()) { ?>
                <div onclick="window.location.href='single_product.php?product_id=<?php echo $row['product_id']; ?>'" class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                    <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
                    <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">Mua Ngay</button></a>
                </div>
            <?php } ?>
        </div>
    </section>
</div>

<?php include('layouts/footer.php') ?>
