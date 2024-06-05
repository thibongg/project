<?php session_start();
include '../admin/masteradmin/config.php';
$conn = $connect;
date_default_timezone_set('Asia/Ho_Chi_Minh');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header('location: login.php');
}

if (isset($_POST['order_btn'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = $_POST['number'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, $_POST['street'] . ', ' . $_POST['city'] . ', ' . $_POST['country'] . ' - ' . $_POST['pin_code']);
    $placed_on = date('d-M-Y H:i:s');

    // $cus_fullname = $_POST['name'];
    // $cus_phone = $_POST['number'];
    // $cus_address = $_POST['email'];
    // $cus_method = $_POST['method'];
    // $cus_street = $_POST['street'];
    // $cus_city = $_POST['city'];
    // $cus_country = $_POST['country'];
    // $cus_pin_code = $_POST['pin_code'];

    // $cart_total = 0;
    $cart_products[] = '';

    $cart_query = mysqli_query($conn, "SELECT * FROM `tbl_orders` WHERE customer_id = '$user_id' AND cart_satus = 'ordering'") or die('query failed');
    if (mysqli_num_rows($cart_query) > 0) {
        while ($cart_item = mysqli_fetch_assoc($cart_query)) {
            $cart_products = $cart_item['prd_name'] . ' (' . $cart_item['prd_quantity'] . ') ';
            $sub_total = $cart_item['prd_price'] * $cart_item['prd_quantity'];
            $prd_quantity = $cart_item['prd_quantity'];
            $cart_total += $sub_total;
            $prd_name = $cart_item['prd_name'];
            $ord_id = $cart_item['ord_id'];

            $product_query = mysqli_query($conn, "SELECT prd_id FROM tbl_product WHERE prd_name = '$prd_name'") or die('query failed');
            if (mysqli_num_rows($product_query) == 1) {
                while ($prd_item = mysqli_fetch_array($product_query)) {
                    $prd_id = $prd_item['prd_id'];
                }
            }

            // $total_products = implode(', ', $cart_products);

            $order_query = mysqli_query($conn, "SELECT * FROM `tbl_order_detail` WHERE cus_name = '$name' AND cus_number = '$number' AND cus_email = '$email' AND cus_method = '$method' AND cus_address = '$address' AND total_products = '$cart_products' AND total_price = '$sub_total'") or die('query failed');

            if ($sub_total == 0) {
                // $message[] = 'Giỏ hàng của bạn chưa có sản phẩm nào!';
            } else {
                mysqli_query($conn, "INSERT INTO `tbl_order_detail`(ordd_id, cus_id, cus_name, cus_number, cus_email, cus_method, cus_address, total_products, prd_id,prd_name, prd_quantity, total_price, placed_on, payment_status) VALUES($ord_id,'$user_id', '$name', '$number', '$email', '$method', '$address', '$cart_products','$prd_id','$prd_name', $prd_quantity, '$sub_total', '$placed_on', 'đang chờ xác nhận')") or die('query failed');
                $message[] = 'Đơn hàng đặt thành công!';
                mysqli_query($conn, "UPDATE `tbl_orders` SET cart_satus = 'ordered' WHERE customer_id = '$user_id' AND cart_satus = 'ordering'") or die('query failed');
                // mysqli_query($conn, "UPDATE `tbl_custommer` SET 
                // cus_fullname = '$cus_fullname',
                // cus_phone = '$cus_phone',
                // cus_address = '$cus_address',
                // cus_method = '$cus_method',
                // cus_street = '$cus_street',
                // cus_city = '$cus_city',
                // cus_country = '$cus_country',
                // cus_pin_code = '$cus_pin_code'
                // WHERE cus_id = '$user_id'") or die('query failed');
                // header('location: order.php');
            }
        }
    }
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
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
                                    <h2 class="fw-normal mb-3 pb-3" style="letter-spacing: 2px;">THÔNG TIN GIAO DỊCH </h2>
                                    <?php
                                    $grand_total = 0;
                                    $select_cart = mysqli_query($conn, "SELECT * FROM `tbl_orders` WHERE customer_id = '$user_id' AND cart_satus = 'ordering'") or die('query failed');
                                    if (mysqli_num_rows($select_cart) > 0) {
                                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                                            $total_price = ($fetch_cart['prd_price'] * $fetch_cart['prd_quantity']);
                                            $grand_total += $total_price;
                                    ?>
                                            <p> <?php echo $fetch_cart['prd_name']; ?> <span>(<?php echo $fetch_cart['prd_price'] . 'VNĐ' . ' x ' . $fetch_cart['prd_quantity']; ?>)</span> </p>
                                    <?php
                                        }
                                    } else {
                                        echo '<p class="empty">Giỏ hàng của bạn chưa có sản phẩm nào!</p>';
                                    }
                                    ?>
                                    <div class="form-outline mb-4">
                                        <form method="post">
                                            <label class="form-label" for="form2Example17">Họ và Tên</label>
                                            <input type="text" name="name" required placeholder="Nhập họ và tên" id="form2Example17" class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example17">Số điện thoại</label>
                                            <input type="number" name="number" required placeholder="Nhập số điện thoại" id="form2Example17" class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Email</label>
                                            <input type="email" name="email" required placeholder="Nhập email" id="form2Example27" class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Địa chỉ</label>
                                            <input type="text" name="street" required placeholder="Nhập địa chỉ" id="form2Example27" class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Thành phố</label>
                                            <input type="text" name="city" required placeholder="Nhập tên thành phố" id="form2Example27" class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Quốc gia</label>
                                            <input type="text" name="country" required placeholder="Nhập tên quốc gia" id="form2Example27" class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Mã Zip</label>
                                            <input type="number" min="0" name="pin_code" required placeholder="Nhập zip code" id="form2Example27" class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Phương thức thanh toán</label>
                                            <select class="form-select" id="sel1" name="method">
                                                <option value="Ngân hàng">Ngân hàng</option>
                                                <option value="Tiền Mặt">Tiền Mặt</option>
                                            </select>
                                            <input type="submit" class="btn btn-dark btn-lg btn-block" name="order_btn" value="Đồng ý thanh toán">
                                        </form>
                                    </div>

                                    <div class="pt-1 mb-4">

                                    </div>
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