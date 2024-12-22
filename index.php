<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
    <!--Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary py-3 fixed-top">
        <div class="container   ">
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
                <a href="cart.php" ><i class="fas fa-shopping-cart"></i></a>
                <a href="account.html"><i class="fas fa-user"></i></a>
            </li>       

            </ul>
            
        </div>
        </div>
    </nav>

    <!-- Home -->
    <section id="home">
        <div class="container">
            <h5>Sản Phẩm Mới</h5>
            <h1><span>Giá Ưu Đãi</span> Mùa Đông</h1>
            <p>Lava Shop cung cấp những sản phẩm tốt nhất với mức giá phải chăng nhất</p>
            <button>Mua Ngay</button>
        </div>
    </section>

    <!-- Brand -->
    <!-- <section id="brand" class="container">
            <div class="row">
                <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg">
                <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand2.jpg">
                <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand3.jpg">
                <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand4.jpg">
            </div>
        </section> -->

    <!-- new -->
     <section id="new" class="w-100">
        <div class="row p-0 m-0">
            <!-- one -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/1.webp"/>
                <div class="details">
                    <h2>Samsung Thiết Kế Hiện Đại</h2>
                    <button class="text-uppercase">Mua Ngay</button>
                </div>
            </div>
            <!-- two -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/2.webp"/>
                <div class="details">
                    <h2>Iphone Kiểu Dáng Thời Thượng</h2>
                    <button class="text-uppercase">Mua Ngay</button>
                </div>
            </div>
            <!-- three -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/3.webp"/>
                <div class="details">
                    <h2>Tai Nghe Giảm 50%</h2>
                    <button class="text-uppercase">Mua Ngay</button>
                </div>
            </div>
        </div>
     </section>

     <!-- Featured -->
      <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Sản Phẩm Nổi Bật</h3>
            <hr class="mx-auto">
            <p>Ở đây bạn có thể xem những sản phẩm nổi bật nhất của chúng tôi</p>
        </div>

        <div class="row mx-auto container-fluid">
        <?php include('server/get_featured_products.php'); ?>

        <?php while($row = $featured_products->fetch_assoc()){ ?>
            
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name'];?></h5>
                <h4 class="p-price">$<?php echo $row['product_price'];?></h4>
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button classs="buy-btn">Mua Ngay</button></a>
            </div>
        <?php } ?>
        </div>
      </section>

    <!-- Banner -->
     <section id="banner" class="my-5 py-5">
        <div class="container">
            <h4>Sale Đầu Mùa</h4>
            <h1>Bộ Sưu Tập Mùa Đông<br>Giảm tới 30%</h1>
            <button class="text-uppercase">Mua Ngay</button>
        </div>
     </section>

     <!-- Phones -->
     <section id="phones" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Điện Thoại</h3>
            <hr class="mx-auto">
            <p>Ở đây bạn có thể xem những chiếc điện thoại nổi bật nhất của chúng tôi</p>
        </div>
        <div class="row mx-auto container-fluid">
            <?php include('server/get_phones.php'); ?>

            <?php while($row = $phones_products->fetch_assoc()){ ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"> <!-- Thêm liên kết đến trang chi tiết sản phẩm -->
                    <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
                </a>
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

    <!-- Laptops -->
    <section id="laptops" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Laptop</h3>
            <hr class="mx-auto">
            <p>Ở đây bạn có thể xem những chiếc laptop nổi bật nhất của chúng tôi</p>
        </div>
        <div class="row mx-auto container-fluid">
            <?php include('server/get_laptops.php'); ?>

            <?php while($row = $laptops_products->fetch_assoc()){ ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"> <!-- Thêm liên kết đến trang chi tiết sản phẩm -->
                    <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
                </a>
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


    <section id="headphones" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Tai nghe</h3>
            <hr class="mx-auto">
            <p>Những tai nghe tốt nhất của chúng tôi</p>
        </div>
        <div class="row mx-auto container-fluid">
            <?php include('server/get_headphones.php'); ?>

            <?php while($row = $headphones_products->fetch_assoc()){ ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"> <!-- Thêm liên kết đến trang chi tiết sản phẩm -->
                    <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
                </a>
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

            <div class="col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Liên Hệ</h5>
                <div>
                    <h6 class="text-uppercase">Địa chỉ</h6>
                    <p class="fp">Đại Học Công Nghiệp Hà Nội</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Số Điện Thoại</h6>
                    <p class="fp">0961XXXXXX</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Email</h6>
                    <p class="fp">name123@gmail.com</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Được Tạo Bởi</h5>
                <div class="row">
                    <img src="assets/imgs/Uy.jpg" class="img-fluid w-25 h-100 m-2"/>
                    <img src="assets/imgs/Vu.png" class="img-fluid w-25 h-100 m-2"/>
                </div>
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
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>