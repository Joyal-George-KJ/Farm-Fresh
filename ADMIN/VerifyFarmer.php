<?php
session_start();
include '../CONNECTION/DbConnection.php';

$uid = $_REQUEST['id'];
$status = $_REQUEST['status'];

if ($status == 'approved') {

    $query = "UPDATE `login` SET `status`='$status' WHERE `reg_id`='$uid' AND `type`='FARMER'";
    $result = mysqli_query($conn, $query);
    // echo $query;
    if ($result == TRUE) {
        echo "<script type = \"text/javascript\">
        				alert(\"Approved\");
                        window.location = (\"ViewFarmer.php\")
                        </script>";

        echo $query;
    }
} else if ($status == 'reject') {
    $query = "UPDATE `login` SET `status`='$status' WHERE `reg_id`='$uid' AND `type`='FARMER'";
    $result = mysqli_query($conn, $query);
    // echo $query;
    if ($result == TRUE) {
        echo "<script type = \"text/javascript\">
        				alert(\"Rejected\");
                        window.location = (\"ViewFarmer.php\")
                        </script>";

        echo $query;
    }
} else {
    $query = "UPDATE `login` SET `status`='$status' WHERE `reg_id`='$uid' AND `type`='FARMER'";
    $result = mysqli_query($conn, $query);
    // echo $query;
    if ($result == TRUE) {
        echo "<script type = \"text/javascript\">
        				alert(\"Deleted\");
                        window.location = (\"ViewFarmer.php\")
                        </script>";

        echo $query;
    }
}
