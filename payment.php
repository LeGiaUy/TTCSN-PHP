<?php

session_start();

if(isset($_POST['order_pay_btn'])){
    $order_status = $_POST['order_status'];
    $order_total_price = $_POST['order_total_price'];
}

?>

<?php include('layouts/header.php') ?>

    <!-- Payment -->
     <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Payment</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container text-center">
        
        <?php if (isset($_POST['order_status']) && $_POST['order_status'] == "Chưa thanh toán"){?> 
            <?php $amount = strval($_POST['order_total_price']) ?>
            <?php $order_id = $_POST['order_id']; ?>
            <p>Tổng thanh toán: $<?php echo $_POST['order_total_price']; ?></p>
            <!-- <input class="btn btn-primary" type="submit" value="Thanh Toán Ngay"/>  -->
             <!-- Set up a container element for the button -->
            <div class="paypal-container">
                <div id="paypal-button-container" class="paypal-button"></div>
            </div>
        
        <?php } else if(isset($_SESSION['total']) && $_SESSION['total'] != 0){ ?>
            <?php $amount = strval($_SESSION['total']) ?>
            <?php $order_id = $_SESSION['order_id']; ?>
            <p>Tổng thanh toán: $<?php echo $_SESSION['total']; ?></p>
            <!-- <input class="btn btn-primary" type="submit" value="Thanh Toán Ngay"/>  -->
             <!-- Set up a container element for the button -->
            <div class="paypal-container">
                <div id="paypal-button-container" class="paypal-button"></div>
            </div>

        <?php } else{ ?>
            <p>Bạn không có đơn hàng</p>
        <?php } ?>

        
        </div>
     </section>
        
    <!-- Include the PayPal JavaScript SDK; replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=ARVVT7kuAsNKa_moQJ5FCqGlloc8fV6xLRaDuKGyjQnIuInywC8hdDeCUihUTqK_sKnT1VQOSw9QxPQD&currency=USD"></script>


    <script>
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $amount; ?>' // Can reference variables or functions. Example: value: document.getElementById('...')
                        }
                    }]
                });
            },

            // Finalize the transaction after payer approval
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    
                    // Lấy transaction ID và status từ orderData
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction ' + transaction.status + ' : ' + transaction.id + '\nSee console for all available details.');

                    // Chuyển hướng đến trang hoàn tất thanh toán
                    window.location.href = "server/complete_payment.php?transaction_id=" + transaction.id + "&order_id=" + <?php echo $order_id; ?>;
                });
            }
        }).render('#paypal-button-container');
    </script>

        
<?php include('layouts/footer.php') ?>