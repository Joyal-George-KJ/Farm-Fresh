<?php
session_start();
include '../CONNECTION/DbConnection.php';
include 'Dboyheader.php';
$uid = $_SESSION['uid'];
?><br>

<style>
    #qty {
        padding: 6px;
        width: 80px;
        margin: 5px;
        outline: none;
        border: 1px solid grey;
        border-radius: 5px;
    }

    input[type="submit"] {
        border: none;
        background-color: white;
        color: green;
        font-weight: bolder;
    }
</style>

<center>
    <h1>Bookings</h1><br>

    <div class="container section-padding">
        <div class="row">
            <?php
            $res = mysqli_query($conn, "SELECT ucart.*, fproduct.*, user1.*, user2.*
            FROM fproduct
            JOIN ucart ON fproduct.pid = ucart.pid
            JOIN user AS user1 ON ucart.uid = user1.uid
            JOIN user AS user2 ON ucart.fid = user2.uid
            WHERE ucart.status = 'paid';
            ");
            while ($rs = mysqli_fetch_array($res)) {

                $cid = $rs['cid'];
                $stock = $rs['stock'];
                $fid = $rs['fid'];
                $pid = $rs['pid'];
                $price = $rs['price'];
            ?>
                <div class="col-lg-3 col-6 mt-lg-5 mt-4">
                    <div class="card" style="width: 18rem;">
                        <img src="../assets/image/<?php echo $rs['image'] ?>" class="card-img-top" alt="..." style="height:250px;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $rs['name'] ?></h5>
                            Delivery Address: <h5 class="card-title"><?php echo $rs[19] ?></h5>
                             <h5 class="card-title"><?php echo $rs['uphone'] ?></h5>
                             <h5 class="card-title"><?php echo $rs['uaddress'] ?></h5>
                            Pick Address: <h5 class="card-title"><?php echo $rs[24] ?></h5>
                             <h5 class="card-title"><?php echo $rs[26] ?></h5>
                             <h5 class="card-title"><?php echo $rs[27] ?></h5>
                            <!-- Category: <h5 class="card-title"><?php echo $rs['category'] ?></h5> -->
                            <!-- Date: <h5 class="card-text"><?php echo $rs['date'] ?></h5><br> -->
                            <!-- Stock: <h5 class="card-title"><?php echo $rs['tstock'] ?></h5> -->
                            <!-- Price: <h5 class="card-title"><?php echo $rs['total'] ?></h5> -->
                            <h5 class="card-title" style="color: green;"><?php echo $rs['status'] ?></h5>
                            <!-- <a href="update.php?id=<?php echo $rs[0] ?>"><button class="btn btn-outline-danger">Take  Order</button></a> -->
                            <?php if ($rs['dboy']  == 'pending') { ?>
                   
                    <a href="update.php?id=<?php echo $rs[0] ?>&status=takeorder"><button class="btn btn-outline-danger">Take Order</button></a>
                <?php } else { ?>
                    
                    <a href="update.php?id=<?php echo $rs[0] ?>&status=delivered"><button class="btn btn-outline-danger">Delivered</button></a>
                    <?php

}
?>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>
        </div>
    </div>
</center><br><br>

<?php
include '../COMMON/CommonFooter.php';
?>