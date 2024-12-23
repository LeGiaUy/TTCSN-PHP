<?php

session_start();

include('server/connection.php');

//neu nguoi dung da dang ky thanh cong, dua nguoi dung den trang tai khoam
if(isset($_SESSION['logged_in'])){
    header('location: account.php');
    exit;
}

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
                $user_id = $stmt->insert_id;
                $_SESSION = $user_id;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $name;
                $_SESSION['logged_in'] = true;
                header('location: account.php?register_success=Bạn đã đăng ký thành công');
            }
            //neu khong the tao tai khoan
            else{

                header('location: account.php?error=Không thể tạo tài khoản');

            }
        }
    
    }
}


?>

<?php include('layouts/header.php') ?>

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

<?php include('layouts/footer.php') ?>