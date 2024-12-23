<?php

session_start();

?>

<?php include('layouts/header.php') ?>

    <!-- Payment -->
     <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Payment</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container text-center">
            <p><?php if(isset($_GET['order_status'])){ echo $_GET['order_status']; }?></p>
            <p>Tổng thanh toán: $<?php if(isset($_SESSION['total'])){ echo $_SESSION['total']; }?></p>
            <?php if(isset($_SESSION['total'])){ ?>
            <input class="btn btn-primary" type="submit" value="Thanh Toán Ngay"/>
            <?php }?>

            <?php if(isset($_GET['order_status']) && $_GET['order_status'] == "Chưa thanh toán"){ ?>
            <input class="btn btn-primary" type="submit" value="Thanh Toán Ngay"/>
            <?php }?>
        </div>
     </section>
<?php include('layouts/footer.php') ?>