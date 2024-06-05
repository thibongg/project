<?php
$prd = mysqli_query($connect, "SELECT * FROM tbl_product WHERE prd_quantity > 0") or die('query failed');
?>
<div class="swiper-wrapper">

    <?php while ($item = mysqli_fetch_array($prd)) { ?>
        <div class="swiper-slide box">
            <div class="image">
                <img src="../admin/adimn-img/<?php echo $item['prd_image'] ?>" alt="">
            </div>
            <div class="content">
                <h3><?php echo $item['prd_name'] ?></h3>
                <div class="price"><?php echo $item['prd_price'] ?> VND</div>
                <a href="detail.php?prd_id=<?php echo $item['prd_id'] ?>" class="btn">Chi Tiết</a>
            </div>
        </div>
    <?php } ?>
</div>