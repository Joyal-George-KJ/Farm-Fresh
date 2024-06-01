<?php
session_start();
include 'UserHeader.php';
include '../CONNECTION/DbConnection.php';
?>

<!-- /contact-->
<div class="contact-form py-5" id="contact">
    <div class="container py-lg-5 py-md-4">
        <center>
            <h3 class="hny-title mb-lg-5 mb-4">Add Feedback</h3>
            <div class="col-lg-7 contacts12-main mb-4">
                <form method="post" enctype="multipart/form-data">
                    <div class="main-input">

                        <textarea class="contact-textarea" name="feedback" id="w3lMessage" placeholder="Feedback" required></textarea>

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

    $Feedback = $_REQUEST['feedback'];

    $qryReg = "INSERT INTO ufeedback(`uid`,`feedback`)VALUES('$uid','$Feedback')";

    echo $qryReg;

    if ($conn->query($qryReg) == TRUE) {
        echo "<script>alert(' Success');window.location = 'AddFeedback.php';</script>";
    } else {
        echo "<script>alert(' Failed');window.location = 'AddFeedback.php';</script>";
    }
}
?>


<section class="w3l-contact-info-main py-5" id="contact">
    <div class="container py-md-5 py-4">

        <center>
            <div class="title-main text-center mx-auto mb-4">
                <h3 class="title-style">View Feedback</h3>
                <p class="sub-title mt-2">.</p>
            </div>
        </center>


        <div class="row justify-content-center">

            <?php
            $res = mysqli_query($conn, "SELECT `ufeedback`.*,`user`.* FROM `user`,`ufeedback` WHERE `ufeedback`.`uid` = '$uid' AND `ufeedback`.`uid` = `user`.`uid`");
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

<?php
include('../COMMON/CommonFooter.php')
?>