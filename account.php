<?php

session_start();

if(!isset($_SESSION['logged_in'])){
    header('location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản</title>
    
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
                <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                <a href="account.html"><i class="fas fa-user"></i></a>
            </li>       

            </ul>
            
        </div>
        </div>
    </nav>

    <!-- Account -->
     <section class="my-5 py-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <h3 class="font-weight-bold">Thông tin tài khoản</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Tên<span><?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];} ?></span></p>
                    <p>Email<span><?php if(isset($_SESSION['user_email'])){echo $_SESSION['user_email'];}?></span></p>
                    <p><a href="#orders" id="orders-btn">Đơn hàng của bạn</a></p>
                    <p><a href="" id="logout-btn">Đăng xuất</a></p>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <form id="account-form">
                    <h3>Đổi mật khẩu</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" id="account-password" name="password" placeholder="Mật khẩu" required/>
                    </div>
                    <div class="form-group">
                        <label> Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirmPassword" placeholder="Nhập lại mật khẩu" required/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Đổi mật khẩu" class="btn" id="change-pass-btn">
                    </div>
                </form>
            </div>
        </div>
     </section>

     <!-- Orders -->
     <section id="orders" class="cart container my-5 py-3">
        <div class="container mt-2">
            <h2 class="font-weight-bold text-center">Đơn hàng</h2>
            <hr class="mx-auto">
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Sản phẩm</th>
                <th>Date</th>
            </tr>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/featured1.webp"/>
                        <div>
                            <p class="mt-3">Iphone 16 Pro Max</p>
                        </div>
                    </div>
                </td>

                <td>
                    <span>2024-12-22</span>
                </td>
            </tr>
        </table>
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