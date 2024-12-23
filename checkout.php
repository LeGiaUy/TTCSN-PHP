<?php

session_start();

if(!empty($_SESSION['cart']) && isset($_POST['checkout'])){

    //de nguoi dung vao trang thanh toan
}
// dua nguoi dung ve trang chu
else{
    header('location: index.php');
}

?>

<?php include('layouts/header.php') ?>

    <!-- Checkout -->
     <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Thanh toán</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="checkout-form" action="server/place_order.php" method="POST">
                <div class="form-group checkout-small-element">
                    <label>Tên</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Tên" required/>
                </div>
                <div class="form-group checkout-small-element">
                    <label>Email</label>
                    <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required/>
                </div>
                <div class="form-group checkout-small-element">
                    <label>Số điện thoại</label>
                    <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Số điện thoại" required/>
                </div>
                <div class="form-group checkout-small-element">
                    <label>Thành phố</label>
                    <input type="text" class="form-control" id="checkout-city" name="city" placeholder="Thành phố" required/>
                </div>
                <div class="form-group checkout-large-element">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Địa chỉ" required/>
                </div>
                <div class="form-group checkout-btn-container">
                    <p>Tổng tiền: $ <?php echo $_SESSION['total']?></p>
                    <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Đặt hàng"/>
                </div>
            </form>
        </div>
     </section>

<?php include('layouts/footer.php') ?>