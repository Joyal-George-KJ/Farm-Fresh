<?php
session_start();
include '../CONNECTION/DbConnection.php';

$id = $_REQUEST['id'];
$status = $_REQUEST['status'];

$uid = $_SESSION['uid'];


    $query = "UPDATE `ucart` SET `dboy`='$uid' WHERE `cid`='$id'";
    $result = mysqli_query($conn, $query);
    // echo $query;
    if ($result == TRUE) {
        echo "<script type = \"text/javascript\">
        				alert(\"success\");
                        window.location = (\"viewbooking.php\")
                        </script>";

        // echo $query;
    
} 


if ($status == 'takeorder') {

    $query = "UPDATE `ucart` SET `dboy`='$uid' WHERE `cid`='$id'";
    $result = mysqli_query($conn, $query);
    // echo $query;
    if ($result == TRUE) {
        echo "<script type = \"text/javascript\">
        				alert(\"success\");
                        window.location = (\"viewbooking.php\")
                        </script>";
    }
} else if ($status == 'delivered') {
    $query = "UPDATE `ucart` SET `status`='$status' WHERE `cid`='$id'";
    $result = mysqli_query($conn, $query);
    // echo $query;
    if ($result == TRUE) {
        echo "<script type = \"text/javascript\">
        				alert(\"success\");
                        window.location = (\"viewbooking.php\")
                        </script>";
    }
} else {
   

        echo $query;
    }

