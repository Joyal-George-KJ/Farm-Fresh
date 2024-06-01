<?php
session_start();
include "../CONNECTION/dbConnection.php";

$id=$_GET['id'];

$query="DELETE FROM `category` WHERE`cid` ='$id'";
// echo $query;
$result=mysqli_query($conn,$query);
// echo $result;
//  echo $query;
if($result){
    echo "<script type=\"text/javascript\">
         alert(\"Deleted\");
         window.location=(\"AddCategory.php\");
    </script>";
}