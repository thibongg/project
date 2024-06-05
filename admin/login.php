<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    include 'masteradmin/security.php';
    header('location: index.php');
} else {
    include 'masteradmin/config.php';
    if (isset($_POST['sbm'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sqlcheck = "SELECT username, user_pass FROM tbl_user WHERE username = '$username' AND user_pass = '$password'";
        $check = mysqli_num_rows(mysqli_query($connect, $sqlcheck));
        if ($check == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header('location: index.php');
        } else {
            $erross = '<div class=" alert alert-danger"><h2>Sai tài khoản hoặc mật khẩu</h2></div>';
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Store Admin</title>
        <link rel="icon" href="adimn-img/icon.png">
        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
        <!-- custom css file link  -->
        <link rel="stylesheet" href="admincss/login.css">

    </head>

    <body>

        <div class="form-container">

            <form action="" method="post">
                <?php
                if (isset($erross)) {
                    echo $erross;
                }
                ?>
                <h3>Đăng nhập</h3>
                <input type="username" name="username" placeholder="Username " required class="box">
                <input type="password" name="password" placeholder="Password" required class="box">
                <input type="submit" name="sbm" class="btn">

            </form>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>
<?php } ?>