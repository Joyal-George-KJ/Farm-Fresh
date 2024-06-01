<?php
session_start();
include '../CONNECTION/DbConnection.php';

$uid = $_REQUEST['id'];
$status = $_REQUEST['status'];



    $query = "UPDATE `login` SET `status`='$status' WHERE `reg_id`='$uid' AND `type`='Dboy'";
    $result = mysqli_query($conn, $query);
    // echo $query;
    if ($result == TRUE) {
        echo "<script type = \"text/javascript\">
        				alert(\"Rejected\");
                        window.location = (\"viewdboy.php\")
                        </script>";

        // echo $query;
    
} 
