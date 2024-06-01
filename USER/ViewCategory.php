<?php
session_start();
$uid = $_SESSION['uid'];
include 'UserHeader.php';
include '../CONNECTION/DbConnection.php';
?>

<section class="w3l-team" id="team">
    <div class="team-block py-5">
        <div class="container py-lg-5">
            <div class="title-content text-center mb-lg-3 mb-4">
                <h6 class="sub-title">View</h6>
                <h3 class="hny-title">Category</h3>
            </div><br><br>
            <center>
                <div class="row justify-content-center" style="gap: 26px">
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM `category`");
                    while ($rs = mysqli_fetch_array($res)) {
                    ?>
                        <div class="col-sm-6 col-xl-3 cat">
                            <div class="single_feature">
                                <div class="single_feature_part">
                                    <span class="single_feature_icon"><i class="ti-layers"></i></span>
                                    <a href="ViewProduct.php?cate=<?php
                                                                echo $rs['category']
                                                                ?>">
                                        <h4><?php
                                            echo $rs['category']
                                            ?></h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </center>
        </div>
    </div>
</section>


<?php
include '../COMMON/CommonFooter.php';
?>