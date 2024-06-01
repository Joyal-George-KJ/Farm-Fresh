<?php
include 'Adminheader.php';
include '../CONNECTION/DbConnection.php';

?>
<section class="w3l-contact-info-main py-5" id="contact">
    <div class="container py-md-5 py-4">

        <center>
            <div class="title-main text-center mx-auto mb-4">
                <h3 class="title-style">Delivery Boy</h3>
                <p class="sub-title mt-2">.</p>
            </div>
        </center>


        <div class="row justify-content-center">

            <?php
            $res = mysqli_query($conn, "SELECT `delivery_boy`.*,`login`.* FROM `delivery_boy`,`login` WHERE `login`.`status` = 'approved' AND `login`.`type`='Dboy' AND `login`.`reg_id`=`delivery_boy`.`id`");
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
                            echo $rs['bname']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['bemail']
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $rs['bphone']
                            ?>
                        </td>

                        <td>
                        <a class="btn btn-outline-danger" href="deletedboy.php?id=<?php echo $rs['id'] ?>&status=pending"> Delect</a>
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