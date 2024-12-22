<?php
if (isset($_GET['product_id'])) {

    include('server/connection.php');

    $product_id = $_GET['product_id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");

    $stmt->bind_param("i", $product_id);

    $stmt->execute();

    $product = $stmt->get_result();
    
} else {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sản phẩm</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .product img {
            width: 100%;
            height: auto;
            box-sizing: border-box;
            object-fit: cover;
        }

        .pagination a {
            color: coral;
        }

        .pagination li:hover a {
            color: #fff;
            background-color: coral;
        }
    </style>
</head>
<body>
    <!--Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary py-3 fixed-top">
        <div class="container">
            <img class="logo" src="assets/imgs/logo.png"/>
            <h2 class="brand">Lava Shop</h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.html">Cửa hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Liên Hệ</a>
                    </li>
                    <li class="nav-item">
                        <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                        <a href="account.html"><i class="fas fa-user"></i></a>
                    </li>       
                </ul>
            </div>
        </div>
    </nav>

    <!-- Single Product -->
    <section class="container single-product my-5 pt-5">
        <div class="row mt-5">
            <?php while($row = $product->fetch_assoc()){ ?>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="assets/imgs/<?php echo $row['product_image']; ?>" id="mainImg"/>
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image']; ?>" width="100%" class="small-img"/>
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image2']; ?>" width="100%" class="small-img"/>
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image3']; ?>" width="100%" class="small-img"/>
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image4']; ?>" width="100%" class="small-img"/>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <h6>Apple</h6>
                <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                <h2>$<?php echo $row['product_price']; ?></h2>
                <input type="number" value="1"/>
                <button class="buy-btn">Thêm Vào Giỏ Hàng</button>
                <h4 class="mt-5 mb-5">Mô Tả</h4>
                <span>
                    <?php echo $row['product_description']; ?>
                </span>
            </div>
            <?php } ?>
        </div>
    </section>

    <!-- Related Products -->
    <section id="related-products" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Sản Phẩm Liên Quan</h3>
            <hr class="mx-auto">
            <p>Ở đây bạn có thể xem những sản phẩm liên quan đến sản phẩm trên</p>
        </div>
        <div class="row mx-auto container-fluid">
            <!-- You can update these with dynamic content as needed -->
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/featured1.webp"/>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Iphone 16 Pro Max</h5>
                <h4 class="p-price">$999</h4>
                <button class="buy-btn">Mua Ngay</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <img class="flogo" src="assets/imgs/logo.png"/>
                <p class="pt-3 fp">Chúng tôi cung cấp những sản phẩm tốt nhất với giá cả phải chăng</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Sản Phẩm Nổi Bật</h5>
                <ul class="text-uppercase">
                    <li><a href="#">Điện thoại</a></li>
                    <li><a href="#">Laptops</a></li>
                    <li><a href="#">Desktops</a></li>
                    <li><a href="#">Tai Nghe</a></li>
                    <li><a href="#">Đồng Hồ</a></li>
                    <li><a href="#">Phụ Kiện</a></li>
                </ul>
            </div>
        </div>

        <div class="copyright mt-5">
            <div class="row container mx-auto">
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                    <img src="assets/imgs/payment.jpg"/>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                    <p class="fp">Lava Shop @ 2024 All Right Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        var mainImg = document.getElementById("mainImg");
        var smallImg = document.getElementsByClassName("small-img");

        for(let i = 0; i < 4; i++) {
            smallImg[i].onclick = function() {
                mainImg.src = smallImg[i].src;
            }
        }
    </script>
</body>
</html>
