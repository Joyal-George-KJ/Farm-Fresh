<?php
include 'Adminheader.php';
include '../CONNECTION/DbConnection.php';
$res = mysqli_query($conn, "SELECT `farmer`.*,`login`.* FROM `farmer`,`login` WHERE `login`.`status` = 'pending' AND `login`.`type`='FARMER' AND `login`.`reg_id`=`farmer`.`fid`");
?>


<section class="w3l-contact-info-main py-5" id="contact">
    <div class="container py-md-5 py-4">

        <center>
            <div class="title-main text-center mx-auto mb-4">
                <h3 class="title-style">View Farmer</h3>
                <p class="sub-title mt-2">.</p>
            </div>
        </center>


        <div class="row justify-content-center">

            <table border='2' align="center" class="table  table-bordered text-center table-striped" style="width: 60%; margin-top: -1%;">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                
                    <th colspan="2">Action</th>
                </tr>
                <?php
                while ($rs = mysqli_fetch_array($res)) {
                ?>

                    <tr>
                        <td>
                            <?php
                            echo $rs['fname']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['femail']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['fphone']
                            ?>
                        </td>

                        <td>
                            <a class="btn btn-outline-success" href="VerifyFarmer.php?id=<?php echo $rs['fid'] ?>&status=approved"> Approve</a>
                        </td>

                        <td>
                            <a class="btn btn-outline-danger" href="VerifyFarmer.php?id=<?php echo $rs['fid'] ?>&status=reject"> Reject</a>

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
                <h3 class="title-style">Approved Farmer</h3>
                <p class="sub-title mt-2">.</p>
            </div>
        </center>


        <div class="row justify-content-center">

            <?php
            $res = mysqli_query($conn, "SELECT `farmer`.*,`login`.* FROM `farmer`,`login` WHERE `login`.`status` = 'approved' AND `login`.`type`='FARMER' AND `login`.`reg_id`=`farmer`.`fid`");
            ?>

            <table border='2' align="center" class="table  table-bordered text-center table-striped" style="width: 60%; margin-top: -1%;">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    
                    <th colspan="2">Action</th>
                </tr>
                <?php
                while ($rs = mysqli_fetch_array($res)) {
                ?>

                    <tr>
                        <td>
                            <?php
                            echo $rs['fname']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['femail']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['fphone']
                            ?>
                        </td>


                        <td>
                        <a class="btn btn-outline-danger" href="VerifyFarmer.php?id=<?php echo $rs['fid'] ?>&status=pending"> Delect</a>
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