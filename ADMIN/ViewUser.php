<?php
include 'Adminheader.php';
include '../CONNECTION/DbConnection.php';
$res = mysqli_query($conn, "SELECT `user`.*,`login`.* FROM `user`,`login` WHERE `login`.`status` = 'pending' AND `login`.`type`='USER' AND `login`.`reg_id`=`user`.`uid`");
?>


<section class="w3l-contact-info-main py-5" id="contact">
    <div class="container py-md-5 py-4">

        <center>
            <div class="title-main text-center mx-auto mb-4">
                <h3 class="title-style">View Users</h3>
                <p class="sub-title mt-2">.</p>
            </div>
        </center>


        <div class="row justify-content-center">

            <table  align="center" class="table  table-borderless text-center table-dark table-striped" >
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>APPROVE</th>
                    <th>REJECT</th>

                    <!-- <th colspan="2">Action</th> -->
                </tr>
                <?php
                while ($rs = mysqli_fetch_array($res)) {
                    
                ?>

                    <tr>
                        <td>
                            <?php
                            echo $rs['uname']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['uemail']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['uphone']
                            ?>
                        </td>

                        <td>
                            <a class="btn btn-outline-success" href="VerifyUser.php?id=<?php echo $rs['uid'] ?>&status=approved"> Approve</a>
                        </td>

                        <td>
                            <a class="btn btn-outline-danger" href="VerifyUser.php?id=<?php echo $rs['uid'] ?>&status=reject"> Reject</a>

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
                <h3 class="title-style">Approved Users</h3>
                <p class="sub-title mt-2">.</p>
            </div>
        </center>


        <div class="row justify-content-center">

            <?php
            $res = mysqli_query($conn, "SELECT `user`.*,`login`.* FROM `user`,`login` WHERE `login`.`status` = 'approved' AND `login`.`type`='USER' AND `login`.`reg_id`=`user`.`uid`");
            ?>

            <table align="center" class="table  table-borderless text-center table-dark table-striped" >
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
                            echo $rs['uname']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['uemail']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['uphone']
                            ?>
                        </td>

                        <td>
                        <a class="btn btn-outline-danger" href="VerifyUser.php?id=<?php echo $rs['uid'] ?>&status=pending"> Remove</a>
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