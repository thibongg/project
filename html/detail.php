<?php session_start();
include '../admin/masteradmin/config.php';
$prd_idg = $_GET['prd_id'];
$prd = mysqli_query($connect, "SELECT *,
(SELECT `cate_name` FROM tbl_category WHERE tbl_category.cate_id = tbl_product.cate_id) AS cate_name,
(SELECT `pubc_name` FROM tbl_pubc WHERE tbl_pubc.pubc_id = tbl_product.pubc_id) AS pubc_name
FROM tbl_product WHERE prd_id = $prd_idg") or die('query failed');

if (isset($_POST['add_cart'])) {
    header('location:cart.php');
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
                <a href="cart.php#orders" class="fas fa-shopping-cart"></a>
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

    <?php while ($item = mysqli_fetch_array($prd)) { ?>
        <section class="vh-100" style="background-color: #33FF66;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <p><span class="h2">Chi tiết sản phẩm </span>

                        <div class="card mb-4">
                            <div class="card-body p-4">

                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <img src="../admin/adimn-img/<?php echo $item['prd_image'] ?>" width="180px" alt="" class="detailsimg">
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-1">Tên sản phẩm</p>
                                            <p class="lead fw-normal mb-0"><?php echo $item['prd_name'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-1">Giá</p>
                                            <p class="lead fw-normal mb-0"><?php echo $item['prd_price'] ?> VND</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Loại</p>
                                            <p class="lead fw-normal mb-0"><?php echo $item['cate_name'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Nhà xuất bản</p>
                                            <p class="lead fw-normal mb-0"><?php echo $item['pubc_name'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Mô tả</p>
                                            <p class="lead fw-normal mb-0"><?php echo $item['prd_description'] ?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <form action="cart.php" method="post">
                                <div><h3>Số lượng :</h3>
                                    <input type="number" name="prd_quantity" min="1" value="1" id=""></div>
                                <a href="index.php#featured" class="btn btn-light btn-lg me-2">Tiếp tục mua sắm </a>
                                <input type="hidden" name="prd_id" value="<?php echo $item['prd_id'] ?>">
                                <input type="hidden" name="prd_name" value="<?php echo $item['prd_name'] ?>">
                                <input type="hidden" name="prd_image" value="<?php echo $item['prd_image'] ?>">
                                <input type="hidden" name="prd_price" value="<?php echo $item['prd_price'] ?>">
                                <button type="submit" class="btn btn-primary btn-lg" name="add_cart">Thêm vào giỏ hàng</button>
                                <!-- lấy thông tin ở form bằng post-->
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script src="../js/script.js"></script>

</body>

</html>