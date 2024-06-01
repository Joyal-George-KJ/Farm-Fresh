<?php
session_start();
include 'UserHeader.php';
include '../CONNECTION/DbConnection.php';
?>

<!-- /contact-->
<div class="contact-form py-5" id="contact">
    <div class="container py-lg-5 py-md-4">
        <center>
            <h3 class="hny-title mb-lg-5 mb-4">Add Products</h3>
            <div class="col-lg-7 contacts12-main mb-4">
                <form method="post" enctype="multipart/form-data">
                    <div class="main-input">
                        <div class="d-grid">
                            <input type="file" name="photo" id="w3lName" placeholder="Your Name" class="contact-input" required />
                            <select name="category" style="  margin-bottom: 30px;
              outline: none;
              border: transparent;
              border:1px solid var(--border-light);
              padding: 15px 15px;
              font-size: 16px;
              line-height: 26px;
              color: var(--font-color);
              width: 100%;
              height: inherit;
              background: none;
              border-radius: var(--border-radius-1);">
                                <option>....Choose Category....</option>
                                <?php
                                $res = mysqli_query($conn, "SELECT * from `category`");
                                while ($rs = mysqli_fetch_array($res)) {
                                    echo "<option>" . $rs['1'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="d-grid">
                            <input type="text" name="price" id="w3lSender" placeholder="Enter Price" class="contact-input" required />
                            <input type="text" name="stock" id="w3lSubject" placeholder="Enter Stock" class="contact-input" required />
                        </div>
                        <input type="text" name="name" id="w3lSubject" placeholder="Enter Name" class="contact-input" required />
                        <textarea class="contact-textarea" name="desc" id="w3lMessage" placeholder="Description" required></textarea>

                    </div>

                    <div class="text">
                        <button class="btn btn-style btn-secondary btn-contact" name="add">Add</button>
                    </div>
                </form>
            </div>
        </center>
    </div>
</div>
<!--//contact-->



<?php

$uid = $_SESSION['uid'];
if (isset($_REQUEST['add'])) {

    $Category = $_REQUEST['category'];
    $Price = $_REQUEST['price'];
    $Stock = $_REQUEST['stock'];
    $Desc = $_REQUEST['desc'];
    $Name = $_REQUEST['name'];

    $filename = $_FILES["photo"]["name"];
    $tempname = $_FILES["photo"]["tmp_name"];
    $folder = "image/" . $filename;

    if (move_uploaded_file($tempname, '../assets/image/' . $filename)) {
        $qryCheck = "SELECT COUNT(*) AS cnt FROM `fproduct` WHERE `name` = '$pname' OR `price` = '$price'";

        $qryOut = mysqli_query($conn, $qryCheck);

        $fetchData = mysqli_fetch_array($qryOut);

        if ($fetchData['cnt'] > 0) {
            echo "<script>alert('Already exist ');
             window.location = 'AddProduct.php';
            </script>";
        } else {

            $qryReg = "INSERT INTO fproduct(`fid`,`name`,`category`,`price`,`image`,`stock`,`desc`)VALUES('$uid','$Name','$Category','$Price','$filename','$Stock','$Desc')";

            echo $qryReg;

            if ($conn->query($qryReg) == TRUE) {
                echo "<script>alert(' Success');window.location = 'AddProduct.php';</script>";
            } else {
                echo "<script>alert(' Failed');window.location = 'AddProduct.php';</script>";
            }
        }
    }
}
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

                $res = mysqli_query($conn, "SELECT * FROM `fproduct` WHERE `fid`=$uid");
                while ($rs = mysqli_fetch_array($res)) {
                    // $stock = $rs['stocks'];
                    $pid = $rs['pid'];
                ?>
                    <div class="col-lg-4 col-6 mt-lg-5 mt-4">

                        <div class="box16">
                            <a href="#url"><img src="../assets/image/<?php echo $rs['image'] ?>" alt="" class="img-fluid" /></a>
                            <div class="box-content">
                                <h3 class="title"><a href="#url"><?php echo $rs['name'] ?></a></h3>
                                <span class="post">Rs:<?php echo $rs['price'] ?>/-</span>
                                <span class="post">Stock:<?php echo $rs['stock'] ?></span>
                                <ul class="social">
                                    <li>
                                        <a href="RemoveProduct.php?id=<?php echo $pid ?>" class="facebook">
                                            <span><img src="assets/images/remove.png" alt="" class="img-fluid" /></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="UpdateProduct.php?id=<?php echo $pid ?>" class="facebook">
                                            <span><img src="assets/images/update.png" alt="" class="img-fluid" /></span>
                                        </a>
                                    </li>
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

<?php
include('../COMMON/CommonFooter.php')
?>