<?php

session_start();

include('server/connection.php');

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    //neu mat khau khong trung
    if($password !== $confirmPassword) {
        header('location: register.php?error=Mật khẩu không trùng');
    }

    //neu mat khau it hon 6 ki tu
    else if(strlen($password) < 6){
        header('location: register.php?error=Mật khẩu phải có ít nhất 6 kí tự');
    }

    //neu khong co loi
    else{

        //check neu co nguoi dung da dung email nay roi
        $stmt1 = $conn->prepare("SELECT count(*) FROM users WHERE user_email=?");
        $stmt1->bind_param('s',$email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();
        
        //neu co nguoi da dang ky voi email nay
        if($num_rows != 0) {
            header('location: register.php?error=Email đã được sử dụng');
        }
        //neu chua dung email
        else{
            //tao nguoi dung moi
            $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password)
                            VALUES (?,?,?)");
        
            $stmt->bind_param('sss',$name,$email,md5($password));
        
            //neu tao tai khoan thanh cong
            if($stmt->execute()){
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $name;
                $_SESSION['logged_in'] = true;
                header('location: account.php?register=Bạn đã đăng ký thành công');
            }
            //neu khong the tao tai khoan
            else{

                header('location: account.php?error=Không thể tạo tài khoảng');

            }
        }
    
    }
}
//neu nguoi dung da dang ky thanh cong, dua nguoi dung den trang tai khoam
else if(isset($_SESSION['logged_in'])){
    header('location: account.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    
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

    <!-- register -->
     <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Đăng ký</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="register-form" method="POST" action="register.php">
            <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error']; }?></p>
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="Tên" required/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required/>
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required/>
                </div>
                <div class="form-group">
                    <label>Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" id="cornfirm-password" name="confirmPassword" placeholder="Nhập lại mật khẩu" required/>
                </div>
                <div class="form-group">
                    <input type="submit" name="register" class="btn" id="register-btn" value="Đăng ký"/>
                </div>
                <div class="form-group">
                    <a id="login-url" href="login.php" class="">Đã có tài khoản? Đăng nhập</a>
                </div>
            </form>
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