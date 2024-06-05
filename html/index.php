<?php session_start();
include '../admin/masteradmin/config.php';
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}else {
    header('location: login.php');
}
?>



<!DOCTYPE html>
<html lang="vie">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bống Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../images/storeimages.png" type="image/x-icon">
</head>

<body>
    <header class="header">

        <div class="header-1">

            <a href="index.php#home" class="logo"></i><img src="../images/storeimages1.png" alt=""> Bống Store</a>

            <div class="icons">
                <div id="search-btn" class="fas fa-search"></div>
                <a href="cart.php" class="fas fa-shopping-cart"></a>
                <a href="logout.php" class="fas fa-user" id="login-btn"></a>

            </div>

        </div>

        <div class="header-2">
            <nav class="navbar">
                <a href="#home">Trang chủ</a>
                <a href="#featured">Sản phẩm</a>
                <a href="#reviews">Đánh giá</a>
                <a href="#contacts">Liên hệ</a>
                <a href=order.php>Đơn hàng</a>
            </nav>
        </div>
    </header>

    <nav class="bottom-navbar">
        <a href="#home" class="fas fa-home"></a>
        <a href="#products" class="fas fa-products"></a>
        <a href="#reviews" class="fas fa-comments"></a>
        <a href="#contacts" class="fas fa-contacts"></a>
    </nav>


    <div class="login-form-container">
        <div id="close-login-btn" class="fas fa-times"></div>
    </div>

    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-plane"></i>
            <div class="content">
                <h3>Vận chuyển miễn phí</h3>
                <p>Đơn hàng từ 100k </p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-lock"></i>
            <div class="content">
                <h3>Thanh toán an toàn</h3>
                <p>Bảo mật cao</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-redo-alt"></i>
            <div class="content">
                <h3>Đổi trả hàng</h3>
                <p>Tối đa 10 ngày </p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-headset"></i>
            <div class="content">
                <h3>Hỗ trợ 24/7</h3>
                <p>Hỗ trợ Online 24/7</p>
            </div>
        </div>

    </section>

    <section class="featured" id="featured">

        <h1 class="heading"><span>SẢN PHẨM</span></h1>

        <div class="swiper featured-slider">


            <?php include 'prd.php' ?>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>
    </section>

    <section class="reviews" id="reviews">

        <h1 class="heading"><span>ĐÁNH GIÁ</span></h1>

        <div class="swiper reviews-slider">
            <div class="swiper-wrapper">
                <div class="box">
                    <img src="../images/review1.jpg" alt="">
                    <h3>Độ MiXi</h3>
                    <p>Theo Độ đây là trang Web sách lớn bậc nhất tại đất nước ta tính đến thời điểm hiện tại. Web không chỉ bán về sản phẩm sách mà còn giới thiệu những nội dung liên quan đến sách</p>
                </div>

                <div class="box">
                    <img src="../images/review2.jpg" alt="">
                    <h3>Thầy Giáo Ba</h3>
                    <p>Một trang web tuyệt vời mà anh Ba thường ghé mua sách và để tìm hiểu thêm nhiều thể loại sách mới </p>
                </div>

                <div class="box">
                    <img src="../images/review3.png" alt="">
                    <h3>Sơn Tùng MTP</h3>
                    <p>Nhà sách chất lượng , vận chuyển nhanh chóng , rất tiện lợi </p>
                </div>

                <div class="box">
                    <img src="../images/review4.jpg" alt="">
                    <h3>Rapper Đen Vâu</h3>
                    <p>Một nơi mà Đen có thể tìm thấy những kiến thức mà mình cần ! </p>
                </div>

                <div class="box">
                    <img src="../images/review5.jpg" alt="">
                    <h3>Bray</h3>
                    <p>Bống Store giúp mình có thêm kiến thức từ rất nhiều thể loại sách . Dịch vụ nhanh , tiện lợi , rất phù hợp với công việc bận rộn của mình </p>
                </div>

            </div>

        </div>

    </section>

    <section class="footer" id="contacts">

        <div class="box-container">

            <div class="box">
                <h3>Contacts</h3>
                <a href="#home">Trang Chủ</a>
                <a href="#featured">Sản phẩm</a>
                <a href="#reviews">Đánh giá</a>
            </div>

            <div class="box">
                <h3>Liên Hệ</h3>
                <p> <i class="fas fa-phone"></i> +84 344378966 </p>
                <p> <i class="fas fa-envelope"></i> bongstore@gmail.com</p>
                <p> <i class="fas fa-map-marker-alt"></i> Hanoi - Vietnam </p>
            </div>

        </div>


    </section>



    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script src="../js/script.js"></script>

</body>

</html>