<?php session_start();
include '../admin/masteradmin/config.php';
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}else {
    header('location: login.php');
}
$conn = $connect;


if (isset($_POST['add_cart'])) {
    $product_price = $_POST['prd_price'];
    $product_image = $_POST['prd_image'];
    $product_name = $_POST['prd_name'];
    $product_quantity = $_POST['prd_quantity'];

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `tbl_orders` WHERE customer_id = '$user_id' AND prd_name = '$product_name' AND cart_satus = 'ordering'") or die('query failed');

    if (mysqli_num_rows($check_cart_numbers) == 0) {
       mysqli_query($conn, "INSERT INTO `tbl_orders`(customer_id, staff_id, prd_name, prd_price, prd_quantity, prd_image, cart_satus) VALUES('$user_id', '2', '$product_name', '$product_price', '$product_quantity', '$product_image', 'ordering')") or die('query failed');
    //    $message[] = 'Sản phẩm được thêm vào giỏ!';
    } else {
       $item= mysqli_fetch_assoc($check_cart_numbers);
       $oldprd_quantity = $item['prd_quantity'];
       $newprd_quantity = $product_quantity + $oldprd_quantity;
       mysqli_query($conn, "UPDATE `tbl_orders` SET prd_quantity = '$newprd_quantity' WHERE customer_id = '$user_id' AND prd_name = '$product_name'") or die('query failed');
    //    $message[] = 'Sản phẩm được thêm vào giỏ!';
    }
    // var_dump($_SESSION['giohang']);
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `tbl_orders` WHERE ord_id = '$delete_id'") or die('query failed');
    // header('location:cart-notify.php');
}

if (isset($_POST['sbm'])) {
    header('location: userin4.php');
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
                <a href="#orders" class="fas fa-shopping-cart"></a>
                <div id="login-btn" class="fas fa-user"></div>
            </div>

        </div>

        <div class="header-2">
            <nav class="navbar">
                <a href="index.php#home">Trang chủ</a>
                <a href="index.php#featured">Sản phẩm</a>
                <a href="index.php#reviews">Đánh giá</a>
                <a href="index.php#contacts">Liên hệ</a>
                <a href=order.php>Đơn hàng</a>
            </nav>
        </div>
    </header>

    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Giỏ Hàng</h3>
                    </div>
                    <?php
                    $grand_total = 0;
                    $select_cart = mysqli_query($conn, "SELECT * FROM `tbl_orders` WHERE customer_id = '$user_id' AND cart_satus = 'ordering'") or die('query failed');
                    if(mysqli_num_rows($select_cart) > 0){
                       while($fetch_cart = mysqli_fetch_assoc($select_cart)){ 
                            $total = $fetch_cart['prd_quantity'] * $fetch_cart['prd_price'];
                    ?>
                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="../admin/adimn-img/<?php echo $fetch_cart['prd_image']; ?>" alt="" width="150px">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2"><?php echo $fetch_cart['prd_name']; ?></p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <input id="form1" min="1" name="quantity" value="<?php echo $fetch_cart['prd_quantity']; ?>" type="number" class="form-control form-control-sm" />

                                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                        <div class="float-end">
                                            <p class="mb-0 me-5 d-flex align-items-center">
                                                <span class="big text-muted me-2">Tổng tiền:</span> <span class="lead fw-normal"><?php echo $total ?> VND</span>
                                            </p>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="cart.php?delete=<?php echo $fetch_cart['ord_id']; ?>" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                                <button type="submit" class="btn btn-warning btn-block btn-lg" <?php if(mysqli_num_rows($select_cart) == 0){echo 'disabled';} ?> name="sbm">Thanh toán</button>
                            </form>
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