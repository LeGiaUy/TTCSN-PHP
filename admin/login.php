<?php

session_start();

include('../server/connection.php');

if (isset($_SESSION['admin_logged_in'])) {
    header('location: index.php');
    exit;
}

if (isset($_POST['login_btn'])) {

    $email = $_POST['email'];
    $password = md5($_POST['password']); // Kiểm tra xem mật khẩu trong DB có được mã hóa giống vậy không

    $stmt = $conn->prepare("SELECT admin_id, admin_name, admin_email, admin_password FROM admins WHERE admin_email = ? AND admin_password = ? LIMIT 1");

    if (!$stmt) {
        die("Chuẩn bị truy vấn thất bại: " . $conn->error);
    }

    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute()) {
        $stmt->bind_result($admin_id, $admin_name, $admin_email, $admin_password);
        $stmt->store_result();
        
        if ($stmt->num_rows == 1) {
            $stmt->fetch();

            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_name'] = $admin_name;
            $_SESSION['admin_email'] = $admin_email;
            $_SESSION['admin_logged_in'] = true;

            header('location: index.php?login_success=Đăng nhập thành công');
        } else {
            header('location: login.php?error=Sai tài khoản hoặc mật khẩu');
        }
    } else {
        header('location: login.php?error=Có lỗi xảy ra');
    }
}

?>

<?php include('header.php'); ?>
<body>
    <section>
        <div class="container">
            <h2 class="text-center">Đăng nhập</h2>
            <hr>
            <form id="login-form" action="login.php" method="POST">
                <p class="error text-center"><?php if(isset($_GET['error'])){echo $_GET['error']; }?></p>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" id="login-email" name="email" placeholder="Email" required />
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" id="login-password" name="password" placeholder="Password" required />
                </div>
                <div class="form-group">
                    <input type="submit" name="login_btn" id="login-btn" value="Đăng nhập" />
                </div>
            </form>
        </div>
    </section>
</body>
</html>
