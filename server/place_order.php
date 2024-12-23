<?php 

session_start();

include('connection.php');
//neu chua dang nhap
if(!isset($_SESSION['logged_in'])){
    header('location: ../login.php?message=Hãy đăng nhập/đăng ký để đặt hàng');
    exit;
}

//neu da dang nhap
else{

    if(isset($_POST['place_order'])){
    
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    
        //1. lay thong tin nguoi dung va luu no vao csdl
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $order_cost = $_SESSION['total'];
        $order_status = "Chưa thanh toán";
        $user_id = $_SESSION['user_id'];
        $order_date = date('Y-m-d H:i:s');
    
        $stmt = $conn->prepare("INSERT INTO orders (order_cost, order_status, user_id, user_phone, user_city, user_address, order_date)
                        VALUEs(?,?,?,?,?,?,?); ");
    
        $stmt->bind_param('isiisss',$order_cost,$order_status,$user_id,$phone,$city,$address,$order_date);
    
        $stmt_status = $stmt->execute();
    
        if(!$stmt_status){
            header('location: index.php');
            exit;
        }
    
        //2. tao va luu thong tin don hang vao csdl
        $order_id = $stmt->insert_id;
    
    
        //3. lay san pham tu gio hang
        foreach($_SESSION['cart'] as $key => $value){
    
            $product = $_SESSION['cart'][$key];
            $product_id = $product['product_id'];
            $product_name = $product['product_name'];
            $product_image = $product['product_image'];
            $product_price = $product['product_price'];
            $product_quantity = $product['product_quantity'];
    
            //4. luu tung san pham vao order_items trong csdl
            $stmt1 = $conn->prepare("INSERT INTO order_items (order_id,product_id,product_name,product_image,product_price,product_quantity,user_id,order_date)
                            VALUES (?,?,?,?,?,?,?,?)");
    
            $stmt1->bind_param('iissiiis',$order_id,$product_id,$product_name,$product_image,$product_price,$product_quantity,$user_id,$order_date);
    
            $stmt1->execute();
        }
    
        //5. xoa moi thu koi gio hang -> cho den khi thanh toan xong
        //unset($_SESSION['cart']);
    
        $_SESSION['order_id'] = $order_id;
        //6. thong bao rang thanh toan thanh cong hoac co van de
        header('location: ../payment.php?order_status=Đặt hàng thành công');
    
    }
}


?>