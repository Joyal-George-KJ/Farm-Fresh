<?php
include 'AdminHeader.php';
include '../CONNECTION/DbConnection.php';
?>

<!--================ Add Category =================-->

<div class="contact-form py-5" id="contact">
    <div class="container py-lg-5 py-md-4">
        <center>
            <h3 class="hny-title mb-lg-5 mb-4">Add Category</h3>
            <div class="col-lg-12 contacts12-main mb-10">
                <form method="post">
                    <div class="main-input">
                        <div class="d-grid" style="margin-left: 35%;">
                            <input type="text" name="cname" id="w3lName" placeholder="Category Name" class="contact-input" required />
                        </div>
                        <div class="text">
                            <button class="btn btn-style btn-secondary btn-contact" name="add">Add</button>
                        </div>
                </form>
            </div>
        </center>
    </div>
</div>

<!--================ Add Category =================-->

<!--================ Code Area =================-->

<?php

if (isset($_REQUEST['add'])) {

    $Category = $_REQUEST['cname'];

    $qryCheck = "SELECT COUNT(*) AS cnt FROM `category` WHERE `category` = '$Category'";

    $qryOut = mysqli_query($conn, $qryCheck);

    $fetchData = mysqli_fetch_array($qryOut);

    if ($fetchData['cnt'] > 0) {
        echo "<script>alert('Already exist ');
             window.location = 'AddCategory.php';
            </script>";
    } else {

        $qryReg = "INSERT INTO `category` (`category`) VALUES ('$Category')";

        echo $qryReg . "&& ";

        if ($conn->query($qryReg) == TRUE) {
            echo "<script>alert(' Added Successfully');window.location = 'AddCategory.php';</script>";
        } else {
            echo "<script>alert('Somethink Went To Wrong....');window.location = 'AddCategory.php';</script>";
        }
    }
}
?>

<!--================ View Category =================-->

<section class="w3l-grids-block-5 py-5">
    <div class="container py-md-5 py-4">
        <div class="title-heading-w3 text-center mx-auto mb-sm-5 mb-4" style="max-width:700px">
            <h3 class="title-style">View Category</h3>
            <p class="lead mt-2"></p>
        </div>
        <div class="row justify-content-center">
            <?php
            $res = mysqli_query($conn, "SELECT * FROM `category`");
            ?>

            <table  align="center" class="table table-success table-bordereless text-center" >
                <!-- <tr>
                    <th>Category</th>
                    <th>Action</th>
                </tr> -->
                <?php
                while ($rs = mysqli_fetch_array($res)) {
                ?>

                    <tr>
                        <td>
                            <?php
                            echo $rs['category']
                            ?>
                        </td>

                        <td>
                            <a class="btn btn-outline-danger" href="deleteCategory.php?id=<?php echo $rs['cid'] ?>"> Delect</a>
                        </td>

                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</section>

<!--================ View Category =================-->

<?php
include '../COMMON/CommonFooter.php';
?>