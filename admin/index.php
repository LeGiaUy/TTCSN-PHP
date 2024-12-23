<?php 
include('header.php'); 

session_start();
// Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng về trang login
if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php');
    exit;
}
?>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="manage_orders.php">Manage Orders</a></li>
            <li><a href="manage_products.php">Manage Products</a></li>
            <li><a href="manage_customers.php">Manage Customers</a></li>
            <li><a href="create_product.php">Create Product</a></li>
            <li><a href="manage_accounts.php">Manage Accounts</a></li>
            <li><a href="logout.php?logout=1">Đăng xuất</a></li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <h1>Welcome to Admin Dashboard</h1>
        <p>Select an option from the sidebar.</p>
    </div>
    
</body>
</html>
