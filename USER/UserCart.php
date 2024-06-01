<?php
session_start();
include '../CONNECTION/DbConnection.php';
include 'UserHeader.php';
$uid = $_SESSION['uid'];
?><br>

<style>
    #qty {
        padding: 6px;
        width: 80px;
        margin: 5px;
        outline: none;
        border: 1px solid grey;
        border-radius: 5px;
    }

    input[type="submit"] {
        border: none;
        background-color: white;
        color: green;
        font-weight: bolder;
    }
</style>

<center>
    <h1>Cart</h1><br>

    <div class="container section-padding">
        <div class="row">

            <?php
            $res = mysqli_query($conn, "SELECT `ucart`.*,`fproduct`.* FROM `fproduct`,`ucart` WHERE `fproduct`.`pid`=`ucart`.`pid` AND `ucart`.`uid`='$uid' AND `ucart`.`status`='incart'");
            while ($rs = mysqli_fetch_array($res)) {

                $cid = $rs['cid'];
                $stock = $rs['stock'];
                $fid = $rs['fid'];
                $pid = $rs['pid'];
                $price = $rs['price'];
            ?>
                <div class="col-lg-3 col-6 mt-lg-5 mt-4">
                    <div class="card" style="width: 18rem;">
                        <img src="../assets/image/<?php echo $rs['image'] ?>" class="card-img-top" alt="..." style="height: 250px;">
                        <div class="card-body">
                            Name: <h5 class="card-title"><?php echo $rs['name'] ?></h5>
                            Category: <h5 class="card-title"><?php echo $rs['category'] ?></h5>
                            Date: <p class="card-text"><?php echo $rs['date'] ?></p>
                            Desc: <p class="card-text"><?php echo $rs['desc'] ?></p>
                            Stock: <h5 class="card-title"><?php echo $rs['stock'] ?></h5>
                            Price: <h5 class="card-title"><?php echo $rs['price'] ?></h5>
                            <form action="Payment.php">
                                <input id="qty" type="number" max=<?php echo $stock; ?> placeholder="Stock" min=0 required name="neededstock">
                                <br>
                                <?php
                                if ($stock == 0) {
                                    echo "<h4 style='color:red;'>Out of Stock</h4>";
                                } else {
                                ?><br>
                                    <input type="submit" value="Pay">
                                    <input type="hidden" name="cid" value="<?php echo $cid ?>">
                                    <input type="hidden" name="pid" value="<?php echo $pid ?>">
                                    <input type="hidden" name="stock" value="<?php echo $stock ?>">
                                    <input type="hidden" name="price" value="<?php echo $price ?>">
                                <?php

                                }
                                ?><br><br>

                                <!-- <a href="" class=".text-center" style="color:red;float:right">Remove </a> -->
                                <a href="RemoveFromCart.php?cartid=<?php echo $rs['cid'] ?>" class="btn btn-danger">Remove</a>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>
        </div>
    </div>
</center><br><br>

<?php
include '../COMMON/CommonFooter.php';
?>