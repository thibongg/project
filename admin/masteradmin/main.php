<?php
include 'security.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admincss/admin-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="ckeditor/ckeditor.js"></script>
    <script src="adminjs/script.js"></script>
    <link rel="icon" href="../images/storeimages.png" type="image/x-icon">
    <title>ADMIN</title>
</head>

<body>
    <div class="bigmenu">
        <div class="head-container">
            <a href="../html/index.php" class="linkblock head-row">
                <img src="../images/storeimages.png" alt="" class=" img-fluin">
                <span class="link">Book Store</span>
            </a>
        </div>
        <div id="menu-admin-container">
            <div id="menu-admin-row">
                <div class="admin-info">
                    <div class="img-admin">
                        <img src="adimn-img/143086968_2856368904622192_1959732218791162458_n.png" alt="" class="img-fluin">
                    </div>
                    <div class="link-info">
                        <ul class="listmenu-1">
                            <li class="list-ful limenu">
                                <a href="user.php" class="link">ADMIN</a>
                                <ul class="listmenu-2">
                                    <li><a href="logout.php">Đăng xuất</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
