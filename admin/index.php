<?php 
include('header.php'); 

include('../server/connection.php');
session_start();
// Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng về trang login
if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php');
    exit;
}

//hien don hang

$stmt = $conn->prepare("SELECT * FROM orders");

$stmt->execute();

$orders = $stmt->get_result();  

?>

<body>
    
    <?php include('sidemenu.php'); ?>
    <!-- Content -->
    <div class="content">
        <h1>Chào Mừng Tới Admin Dashboard</h1>
        <p>Chọn một chức năng ở thanh công cụ</p>
    </div>
    
</body>
</html>
