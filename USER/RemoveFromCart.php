<?php
session_start();
include "../CONNECTION/dbConnection.php";

$cartid=$_GET['cartid'];

$query="DELETE FROM `ucart` WHERE `cid`='$cartid'";
// echo $query;
$result=mysqli_query($conn,$query);
// echo $result;
//  echo $query;
if($result){
    echo "<script type=\"text/javascript\">
         alert(\"Removed\");
         window.location=(\"ViewCategory.php\");
    </script>";
}