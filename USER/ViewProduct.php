<?php
session_start();
$uid = $_SESSION['uid'];
include 'UserHeader.php';
include '../CONNECTION/DbConnection.php';
$cate = $_GET['cate'];
?>


<section class="w3l-team" id="team">
    <div class="team-block py-5">
        <div class="container py-lg-5">
            <div class="title-content text-center mb-lg-3 mb-4">
                <h6 class="sub-title">View</h6>
                <h3 class="hny-title">Products</h3>
            </div>
            <div class="row">
                <?php

                $res = mysqli_query($conn, "SELECT * FROM `fproduct` WHERE `category`='$cate' and `fid`!='$uid'");
                while ($rs = mysqli_fetch_array($res)) {
                    // $stock = $rs['stocks'];
                    $pid = $rs['pid'];
                    $fid = $rs['fid'];
                ?>
                    <div class="col-lg-4 col-6 mt-lg-5 mt-4">

                        <div class="box16">
                            <a href="#url"><img src="../assets/image/<?php echo $rs['image'] ?>" alt="" class="img-fluid" style="height: 250px;"></a>
                            <div class="box-content">
                                <h3 class="title"><a href="#url"><?php echo $rs['name'] ?></a></h3>
                                <span class="post">Rs:<?php echo $rs['price'] ?>/-</span>
                                <span class="post">Stock:<?php echo $rs['stock'] ?></span>
                                <ul class="social">
                                    <center>
                                        <a class="btn btn-success col-lg-6" href="AddToCart.php?pid=<?php echo $rs['pid'] ?>&stock=<?php echo $rs['stock'] ?>&uid=<?php echo $uid ?>&fid=<?php echo $rs['fid'] ?>&item=<?php echo $rs['name'] ?>">Add to Cart </a>
                                    </center>

                                </ul>
                            </div>
                        </div>
                    </div>
                <?php

                }
                ?>
            </div>
        </div>
    </div>
</section>