<?php
include 'Adminheader.php';
include '../CONNECTION/DbConnection.php';
$res = mysqli_query($conn, "SELECT `investor`.*,`login`.* FROM `investor`,`login` WHERE `login`.`status` = 'pending' AND `login`.`type`='INVESTOR' AND `login`.`reg_id`=`investor`.`i_id`");
?>


<section class="w3l-contact-info-main py-5" id="contact">
    <div class="container py-md-5 py-4">

        <center>
            <div class="title-main text-center mx-auto mb-4">
                <h3 class="title-style">View Investor</h3>
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
                            echo $rs['iname']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['iemail']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['iphone']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['ilicence']
                            ?>
                        </td>

                        <td>
                            <a class="btn btn-outline-success" href="VerifyInvestor.php?id=<?php echo $rs['i_id'] ?>&status=approved"> Approve</a>
                        </td>

                        <td>
                            <a class="btn btn-outline-danger" href="VerifyInvestor.php?id=<?php echo $rs['i_id'] ?>&status=reject"> Reject</a>

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
                <h3 class="title-style">Approved Investor</h3>
                <p class="sub-title mt-2">.</p>
            </div>
        </center>


        <div class="row justify-content-center">

            <?php
            $res = mysqli_query($conn, "SELECT `investor`.*,`login`.* FROM `investor`,`login` WHERE `login`.`status` = 'approved' AND `login`.`type`='INVESTOR' AND `login`.`reg_id`=`investor`.`i_id`");
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
                            echo $rs['iname']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['iemail']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['iphone']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['ilicence']
                            ?>
                        </td>


                        <td>
                        <a class="btn btn-outline-danger" href="VerifyInvestor.php?id=<?php echo $rs['i_id'] ?>&status=pending"> Delect</a>
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