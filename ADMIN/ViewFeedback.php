<?php
session_start();
include 'AdminHeader.php';
include '../CONNECTION/DbConnection.php';
?>

<section class="w3l-contact-info-main py-5" id="contact">
    <div class="container py-md-5 py-4">

        <center>
            <div class="title-main text-center mx-auto mb-4">
                <h3 class="title-style">Farmer Feedback</h3>
                <p class="sub-title mt-2">.</p>
            </div>
        </center>


        <div class="row justify-content-center">

            <?php
            $res = mysqli_query($conn, "SELECT user.uname, user.uemail, ufeedback.feedback FROM user, `ufeedback` WHERE user.uid = ufeedback.uid");
            ?>

            <table border='2' align="center" class="table  table-bordered text-center table-striped" style="width: 60%; margin-top: -1%;">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Feedback</th>
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
                            echo $rs['feedback']
                            ?>
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
                <h3 class="title-style">User Feedback</h3>
                <p class="sub-title mt-2">.</p>
            </div>
        </center>


        <div class="row justify-content-center">

            <?php
            $res = mysqli_query($conn, "SELECT `ufeedback`.*,`user`.* FROM `user`,`ufeedback` WHERE `ufeedback`.`uid` = `user`.`uid`");
            ?>

            <table border='2' align="center" class="table  table-bordered text-center table-striped" style="width: 60%; margin-top: -1%;">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Feedback</th>
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
                            echo $rs['feedback']
                            ?>
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
                <h3 class="title-style">Investor Feedback</h3>
                <p class="sub-title mt-2">.</p>
            </div>
        </center>


        <div class="row justify-content-center">

            <?php
            $res = mysqli_query($conn, "SELECT `ifeedback`.*,`investor`.* FROM `investor`,`ifeedback` WHERE `ifeedback`.`i_id` = `investor`.`i_id`");
            ?>

            <table border='2' align="center" class="table  table-bordered text-center table-striped" style="width: 60%; margin-top: -1%;">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Feedback</th>
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
                            echo $rs['feedback']
                            ?>
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
include('../COMMON/CommonFooter.php')
?>