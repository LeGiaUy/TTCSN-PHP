<?php include('layouts/header.php') ?>

    <!-- Home -->
    <section id="home">
        <div class="container">
            <h5>Sản Phẩm Mới</h5>
            <h1><span>Giá Ưu Đãi</span> Mùa Đông</h1>
            <p>Lava Shop cung cấp những sản phẩm tốt nhất với mức giá phải chăng nhất</p>
            <button>Mua Ngay</button>
        </div>
    </section>

    <!-- Brand -->
    <!-- <section id="brand" class="container">
            <div class="row">
                <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg">
                <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand2.jpg">
                <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand3.jpg">
                <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand4.jpg">
            </div>
        </section> -->

    <!-- new -->
     <section id="new" class="w-100">
        <div class="row p-0 m-0">
            <!-- one -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/1.webp"/>
                <div class="details">
                    <h2>Samsung Thiết Kế Hiện Đại</h2>
                    <button class="text-uppercase">Mua Ngay</button>
                </div>
            </div>
            <!-- two -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/2.webp"/>
                <div class="details">
                    <h2>Iphone Kiểu Dáng Thời Thượng</h2>
                    <button class="text-uppercase">Mua Ngay</button>
                </div>
            </div>
            <!-- three -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/3.webp"/>
                <div class="details">
                    <h2>Tai Nghe Giảm 50%</h2>
                    <button class="text-uppercase">Mua Ngay</button>
                </div>
            </div>
        </div>
     </section>

     <!-- Featured -->
      <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Sản Phẩm Nổi Bật</h3>
            <hr class="mx-auto">
            <p>Ở đây bạn có thể xem những sản phẩm nổi bật nhất của chúng tôi</p>
        </div>

        <div class="row mx-auto container-fluid">
        <?php include('server/get_featured_products.php'); ?>

        <?php while($row = $featured_products->fetch_assoc()){ ?>
            
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name'];?></h5>
                <h4 class="p-price">$<?php echo $row['product_price'];?></h4>
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button classs="buy-btn">Mua Ngay</button></a>
            </div>
        <?php } ?>
        </div>
      </section>

    <!-- Banner -->
     <section id="banner" class="my-5 py-5">
        <div class="container">
            <h4>Sale Đầu Mùa</h4>
            <h1>Bộ Sưu Tập Mùa Đông<br>Giảm tới 30%</h1>
            <button class="text-uppercase">Mua Ngay</button>
        </div>
     </section>

     <!-- Phones -->
     <section id="phones" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Điện Thoại</h3>
            <hr class="mx-auto">
            <p>Ở đây bạn có thể xem những chiếc điện thoại nổi bật nhất của chúng tôi</p>
        </div>
        <div class="row mx-auto container-fluid">
            <?php include('server/get_phones.php'); ?>

            <?php while($row = $phones_products->fetch_assoc()){ ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"> <!-- Thêm liên kết đến trang chi tiết sản phẩm -->
                    <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
                </a>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">Mua Ngay</button></a>
            </div>
            <?php } ?>
        </div>
    </section>

    <!-- Laptops -->
    <section id="laptops" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Laptop</h3>
            <hr class="mx-auto">
            <p>Ở đây bạn có thể xem những chiếc laptop nổi bật nhất của chúng tôi</p>
        </div>
        <div class="row mx-auto container-fluid">
            <?php include('server/get_laptops.php'); ?>

            <?php while($row = $laptops_products->fetch_assoc()){ ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"> <!-- Thêm liên kết đến trang chi tiết sản phẩm -->
                    <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
                </a>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">Mua Ngay</button></a>
            </div>
            <?php } ?>
        </div>
    </section>


    <section id="headphones" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Tai nghe</h3>
            <hr class="mx-auto">
            <p>Những tai nghe tốt nhất của chúng tôi</p>
        </div>
        <div class="row mx-auto container-fluid">
            <?php include('server/get_headphones.php'); ?>

            <?php while($row = $headphones_products->fetch_assoc()){ ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"> <!-- Thêm liên kết đến trang chi tiết sản phẩm -->
                    <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
                </a>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">Mua Ngay</button></a>
            </div>
            <?php } ?>
        </div>
    </section>

<?php include('layouts/footer.php') ?>