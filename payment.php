<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    
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
                <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                <a href="account.html"><i class="fas fa-user"></i></a>
            </li>       

            </ul>
            
        </div>
        </div>
    </nav>

    <!-- Payment -->
     <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Payment</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container text-center">
            <p><?php echo $_GET['order_status']; ?></p>
            <p>Tổng thanh toán: $<?php echo $_SESSION['total']; ?></p>
            <input class="btn btn-primary" type="submit" value="Thanh Toán Ngay"/>
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