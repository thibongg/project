<?php session_start();
include '../admin/masteradmin/config.php';
$conn = $connect;
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="icon" href="../images/storeimages.png" type="image/x-icon">
</head>

<body>
<header class="header">

    <div class="header-1">

        <a href="index.php#home" class="logo"></i><img src="../images/storeimages1.png" alt=""> Bống Store</a>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="cart.php" class="fas fa-shopping-cart"></a>
            <a href="login.php" class="fas fa-user" id="login-btn"></a>
        </div>

    </div>

    <div class="header-2">
        <nav class="navbar">
            <a href="index.php#home">Trang chủ</a>
            <a href="index.php#featured">Sản phẩm</a>
            <a href="index.php#reviews">Đánh giá</a>
            <a href="index.php#contacts">Liên hệ</a>
        </nav>
    </div>
</header>

<nav class="bottom-navbar">
    <a href="#home" class="fas fa-home"></a>
    <a href="#products" class="fas fa-products"></a>
    <a href="#reviews" class="fas fa-comments"></a>
    <a href="#contacts" class="fas fa-contacts"></a>
</nav>
<body style="background-color: #eee;">

<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">

                            

                                <h2 class="fw-normal mb-3 pb-3" style="letter-spacing: 2px;">ĐƠN HÀNG ĐÃ ĐẶT </h2>

                                <div class="form-outline mb-4">
                                <div class="box-container">

<?php
   $order_query = mysqli_query($conn, "SELECT DISTINCT placed_on FROM `tbl_order_detail` WHERE cus_id = '$user_id'") or die('query failed');
   
   if(mysqli_num_rows($order_query) > 0){
      for ($i=0; $i < mysqli_num_rows($order_query); $i++) {
         while ($fetch_orders = mysqli_fetch_array($order_query)) {
            $placed_on = $fetch_orders['placed_on'];
            $prd_name_ord_query = mysqli_query($conn, "SELECT DISTINCT cus_name FROM `tbl_order_detail` WHERE cus_id = '$user_id' AND placed_on = '$placed_on'") or die('query failed');
            $cus_number_ord_query = mysqli_query($conn, "SELECT DISTINCT cus_number FROM `tbl_order_detail` WHERE cus_id = '$user_id' AND placed_on = '$placed_on'") or die('query failed');
            $cus_email_ord_query = mysqli_query($conn, "SELECT DISTINCT cus_email FROM `tbl_order_detail` WHERE cus_id = '$user_id' AND placed_on = '$placed_on'") or die('query failed');
            $cus_address_ord_query = mysqli_query($conn, "SELECT DISTINCT cus_address FROM `tbl_order_detail` WHERE cus_id = '$user_id' AND placed_on = '$placed_on'") or die('query failed');
            $cus_method_ord_query = mysqli_query($conn, "SELECT DISTINCT cus_method FROM `tbl_order_detail` WHERE cus_id = '$user_id' AND placed_on = '$placed_on'") or die('query failed');
            $total_products_ord_query = mysqli_query($conn, "SELECT DISTINCT total_products, prd_id FROM `tbl_order_detail` WHERE cus_id = '$user_id' AND placed_on = '$placed_on'") or die('query failed');
            $total_price_ord_query = mysqli_query($conn, "SELECT SUM(total_price) AS total_price FROM `tbl_order_detail` WHERE cus_id = '$user_id' AND placed_on = '$placed_on'") or die('query failed');
            $payment_status_ord_query = mysqli_query($conn, "SELECT DISTINCT payment_status FROM `tbl_order_detail` WHERE cus_id = '$user_id' AND placed_on = '$placed_on'") or die('query failed');
?>
<div class="box">
   <p> Đặt hàng vào : <span><?php          
   echo $fetch_orders['placed_on']; ?></span> </p>
   <p> Tên : <span><?php while ($fetch_orders = mysqli_fetch_array($prd_name_ord_query)) {
   echo $fetch_orders['cus_name'];} ?></span> </p>
   <p> Số điện thoại : <span><?php while ($fetch_orders = mysqli_fetch_array($cus_number_ord_query)) {
   echo $fetch_orders['cus_number'];} ?></span> </p>
   <p> Email : <span><?php while ($fetch_orders = mysqli_fetch_array($cus_email_ord_query)) {
    echo $fetch_orders['cus_email'];} ?></span> </p>
   <p> Địa chỉ : <span><?php while ($fetch_orders = mysqli_fetch_array($cus_address_ord_query)) {
    echo $fetch_orders['cus_address'];} ?></span> </p>
   <p> Phương thức thanh toán : <span><?php while ($fetch_orders = mysqli_fetch_array($cus_method_ord_query)) {
   echo $fetch_orders['cus_method'];} ?></span> </p>
   <p> Đơn hàng của bạn : <span><?php while ($fetch_orders = mysqli_fetch_array($total_products_ord_query)) { ?>
      <?php echo $fetch_orders['total_products'].', '; ?>
   <?php
   } ?></span> </p>
   <p> Tổng giá : <span><?php while ($fetch_orders = mysqli_fetch_array($total_price_ord_query)) {
   echo $fetch_orders['total_price'];} ?> VNĐ</span> </p>
   <p> Trạng thái : <span style="color:<?php while ($fetch_orders = mysqli_fetch_array($payment_status_ord_query)) {
   if ($fetch_orders["payment_status"] == 'đang chờ xác nhận' || $fetch_orders["payment_status"] == 'đã hủy đơn') {
      echo 'red';
  } elseif ($fetch_orders["payment_status"] == 'đã xác nhận') {
      echo 'blue';
  } else {
      echo 'green';
  } ?>;"><?php echo $fetch_orders['payment_status'];} ?></span> </p>
   </div>
<?php
         }}
}else{
   echo '<p class="empty">Chưa có đơn hàng nào!</p>';
}
?>
</div>
                                </div>

                                <!-- <div class="pt-1 mb-4">
                                    <button class="btn btn-dark btn-lg btn-block" type="button">Đồng ý thanh toán</button>
                                </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="footer" id="contacts">

    <div class="box-container">

        <div class="box">
            <h3>Contacts</h3>
            <a href="index.php#home">Trang Chủ</a>
            <a href="index.php#featured">Sản phẩm</a>
            <a href="index.php#reviews">Đánh giá</a>
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
