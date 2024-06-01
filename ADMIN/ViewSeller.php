<?php
include 'Adminheader.php';
include '../CONNECTION/DbConnection.php';
$res = mysqli_query($conn, "SELECT `seller`.*,`login`.* FROM `seller`,`login` WHERE `login`.`status` = 'pending' AND `login`.`type`='SELLER' AND `login`.`reg_id`=`seller`.`sid`");
?>


<section class="w3l-contact-info-main py-5" id="contact">
    <div class="container py-md-5 py-4">

        <center>
            <div class="title-main text-center mx-auto mb-4">
                <h3 class="title-style">View Seller</h3>
                <p class="sub-title mt-2">.</p>
            </div>
        </center>


        <div class="row justify-content-center">

            <table border='2' align="center" class="table  table-bordered text-center table-striped" style="width: 60%; margin-top: -1%;">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Licence</th>

                    <th colspan="2">Action</th>
                </tr>
                <?php
                while ($rs = mysqli_fetch_array($res)) {
                ?>

                    <tr>
                        <td>
                            <?php
                            echo $rs['sname']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['semail']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['sphone']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['slicence']
                            ?>
                        </td>

                        <td>
                            <a class="btn btn-outline-success" href="VerifySeller.php?id=<?php echo $rs['sid'] ?>&status=approved"> Approve</a>
                        </td>

                        <td>
                            <a class="btn btn-outline-danger" href="VerifySeller.php?id=<?php echo $rs['sid'] ?>&status=reject"> Reject</a>

                        </td>

                    </tr>
                <?php
                }
                ?>
            </table>
        </div>

    </div>
</section>


<section class="w3l-contact-info-main py-5" id="contact">
    <div class="container py-md-5 py-4">

        <center>
            <div class="title-main text-center mx-auto mb-4">
                <h3 class="title-style">Approved Seller</h3>
                <p class="sub-title mt-2">.</p>
            </div>
        </center>


        <div class="row justify-content-center">

            <?php
            $res = mysqli_query($conn, "SELECT `seller`.*,`login`.* FROM `seller`,`login` WHERE `login`.`status` = 'approved' AND `login`.`type`='SELLER' AND `login`.`reg_id`=`seller`.`sid`");
            ?>

            <table border='2' align="center" class="table  table-bordered text-center table-striped" style="width: 60%; margin-top: -1%;">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Licence</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                while ($rs = mysqli_fetch_array($res)) {
                ?>

                    <tr>
                        <td>
                            <?php
                            echo $rs['sname']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['semail']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['sphone']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['slicence']
                            ?>
                        </td>

                        <td>
                        <a class="btn btn-outline-danger" href="VerifySeller.php?id=<?php echo $rs['sid'] ?>&status=pending"> Delect</a>
                        </td>
                        
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>

    </div>
</section>





<?php
include '../COMMON/CommonFooter.php';
?>