<?php
include('server/connection.php');

// Biến mặc định cho danh mục
$category = 'all';

if (isset($_POST['search'])) {
    $category = $_POST['category']; // Lấy giá trị danh mục từ form

    if ($category == 'all') {
        $stmt = $conn->prepare("SELECT * FROM products");
        $stmt->execute();
        $products = $stmt->get_result();
    } else {
        $stmt = $conn->prepare("SELECT * FROM products WHERE product_category=?");
        $stmt->bind_param("s", $category);
        $stmt->execute();
        $products = $stmt->get_result();
    }
} else {
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
            <p>Tìm kiếm</p>
            <hr>
            </div>
            
            <form class="row mx-auto container" action="shop.php" method="POST">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>Danh mục</p>

                    <div class="form-check">
                        <input class="form-check-input" value="all" type="radio" name="category" id="category_all" <?php if ($category == 'all') echo 'checked'; ?>>
                        <label class="form-check-label" for="category_all">Tất cả</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" value="phones" type="radio" name="category" id="category_phones" <?php if ($category == 'phones') echo 'checked'; ?>>
                        <label class="form-check-label" for="category_phones">Điện thoại</label>
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
                        <label class="form-check-label" for="category_accessories">Phụ kiện</label>
                    </div>
                </div>

                <div class="form-group my-3 mx-3">
                    <input type="submit" name="search" value="Tìm kiếm" class="btn btn-primary">
                </div>
            </form>

        </section>
    

        <!-- Products -->
        <section id="shop" class="my-5 py-5">
            <div class="container mt-5 py-5">
                <h3>Sản Phẩm</h3>
                <hr>
                <p>Ở đây bạn có thể xem những sản phẩm của chúng tôi</p>
            </div>
            <div class="row mx-auto container">
                <?php while($row = $products->fetch_assoc()) {?>
                <div onclick="window.location.href='single_product.php?product_id=<?php echo $row['product_id']; ?>'"
                class="product text-center col-lg-3 col-md-4 col-sm-12">
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
                    <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button classs="buy-btn">Mua Ngay</button></a>
                </div>
                
                <?php }?>

                <!-- <nav aria-label="Page navigation example">
                    <ul class="pagination mt-5">
                        <li class="page-item"><a class="page-link" href="#">Trước</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Sau</a></li>
                    </ul>
                </nav> -->
            </div>
        </section>
    </div>

    

<?php include('layouts/footer.php') ?>