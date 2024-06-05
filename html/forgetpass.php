<?php session_start();
include '../admin/masteradmin/config.php';
?>



    <!DOCTYPE html>
    <html lang="vie">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bống Store</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link rel="icon" href="../images/storeimages.png" type="image/x-icon">
    </head>
    <body style="background-color: #eee;">

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form>

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <a href="index.php" target="_blank"><img src="../images/storeimages.png" width="100px" alt="" /></a>
                                    </div>

                                    <h2 class="fw-normal mb-3 pb-3" style="letter-spacing: 2px;">QUÊN MẬT KHẨU </h2>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example17">Vui lòng nhập email hoặc số di động để tìm kiếm tài khoản của bạn.</label>
                                        <input type="email" id="form2Example17" class="form-control form-control-lg" />
                                    </div>

                                    <button type="submit" class="btn btn-success" name="sbm">Tìm kiếm</button>
                                    <button type="submit" class="btn btn-warning" name="reset">Trở lại</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script src="../js/script.js"></script>

    </body>
    </html><?php
