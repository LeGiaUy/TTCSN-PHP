<?php

session_start();

if(isset($_POST['add_to_cart'])){

    // Neu trong gio co san pham
    if(isset($_SESSION['cart'])){

        $products_array_ids = array_column($_SESSION['cart'], "product_id");
        //Check neu san pham da co trong gio chua
        if(!in_array($_POST['product_id'], $products_array_ids)){

            $product_id = $_POST['product_id'];

                $product_array = array(
                                'product_id' => $_POST['product_id'],
                                'product_name' => $_POST['product_name'],
                                'product_price' => $_POST['product_price'],
                                'product_image' => $_POST['product_image'],
                                'product_quantity' => $_POST['product_quantity'],
            );

        $_SESSION['cart'][$product_id] = $product_array;
        }
        // san pham da co trong gio hang
        else{

            echo '<script>alert("Sản phẩm đã có trong giỏ hàng");</script>';
        }
    }
    // Neu trong gio chua co san pham
    else{

        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        $product_array = array(
                        'product_id' => $product_id,
                        'product_name' => $product_name,
                        'product_price' => $product_price,
                        'product_image' => $product_image,
                        'product_quantity' => $product_quantity,
        );

        $_SESSION['cart'][$product_id] = $product_array;
        // [ 2=>[], 3=>[] ] mang cang mang san pham voi unique id la product id

    }

    //tinh tong tien
    calculateTotalCart();
}

// xoa san pham khoi gio hang
else if(isset($_POST['remove_product'])) {

    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);

    //tinh tong tien
    calculateTotalCart();

}

else if(isset($_POST['edit_quantity'])) {

    //lay id va so luong tu form
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];

    //lay mang san pham tu session
    $product_array =  $_SESSION['cart'][$product_id];
    
    //cap nhat so luong san pham trong mang
    $product_array['product_quantity'] = $product_quantity;

    //tra lai mang ve session
    $_SESSION['cart'][$product_id] = $product_array;

    //tinh tong tien
    calculateTotalCart();

}

else{
    header('location: index.php');
}

function calculateTotalCart(){

    $total = 0;

    foreach($_SESSION['cart'] as $key => $value){

        $product = $_SESSION['cart'][$key];

        $price =  $product['product_price'];
        $quantity =  $product['product_quantity'];

        $total = $total + ($price * $quantity);

    }

    $_SESSION['total'] = $total;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    
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

    <!-- Cart -->
     <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bold">Giỏ Hàng</h2>
            <hr>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
            </tr>

            <?php foreach($_SESSION['cart'] as $key => $value){ ?>

            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/<?php echo $value['product_image']; ?>"/>
                        <div>
                            <p><?php echo $value['product_name']; ?></p>
                            <small><span>$</span><?php echo $value['product_price']; ?></small>
                            <br>
                            <form method="POST" action="cart.php">
                                <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>"/>
                                <input type="submit" name="remove_product" class="remove-btn" value="Xóa"></input>
                            </form>
                            
                        </div>
                    </div>
                </td>

                <td>
                    
                    <form method="POST" action="cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>"/>
                        <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>"/>
                        <input type="submit" class="edit-btn" value="Sửa" name="edit_quantity"/>
                    </form>
                    
                </td>

                <td>
                    <span>$</span>
                    <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price'] ?></span>
                </td>
            </tr>

            <?php }?>
            
        </table>

        <div class="cart-total">
            <table>
                <tr>
                    <td>Tổng tiền</td>
                    <td>$ <?php echo $_SESSION['total'];?></td>
                </tr>
            </table>
        </div>

        <div class="checkout-container">
            <form method="POST" action="checkout.php">
                <input type="submit" class="btn checkout-btn" value="Thanh toán" name="checkout"></input>
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