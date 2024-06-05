<?php session_start();
include '../admin/masteradmin/config.php';

if (isset($_SESSION['user_id'])) {
    header('location: index.php');
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $pass = mysqli_real_escape_string($connect, md5($_POST['password']));

    $select_users = mysqli_query($connect, "SELECT * FROM tbl_custommer WHERE cus_address = '$email' AND cus_pass = '$pass'") or die('query failed');

    if (mysqli_num_rows($select_users) > 0) {

        $row = mysqli_fetch_assoc($select_users);
        $_SESSION['user_name'] = $row['cus_username'];
        $_SESSION['user_email'] = $row['cus_address'];
        $_SESSION['user_id'] = $row['cus_id'];
        header('location:index.php');
    } else {
        $message[] = 'Sai email hoặc password!';
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

                                <form action="" method="post">

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <a href="index.php" target="_blank"><img src="../images/storeimages.png" width="100px" alt="" /></a>
                                    </div>

                                    <h2 class="fw-normal mb-3 pb-3" style="letter-spacing: 2px;">ĐĂNG NHẬP</h2>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example17">Tài Khoản</label>
                                        <input type="email" name="email" id="form2Example17" class="form-control form-control-lg" required/>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example27">Mật Khẩu</label>
                                        <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" required/>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" name="submit" type="submit">Đăng Nhập</button>
                                    </div>

                                    <a class="big text-muted" href="forgetpass.php">Quên mật khẩu </a>
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Chưa có tài khoản? <a href="register.php" style="color: #393f81;">Đăng ký</a></p>
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
</html>