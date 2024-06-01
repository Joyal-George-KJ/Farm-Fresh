<?php
session_start();
include '../CONNECTION/DbConnection.php';


$pid = $_REQUEST['pid'];
$uid = $_REQUEST['uid'];
$fid = $_REQUEST['fid'];
$item = $_REQUEST['item'];
$mdate =  date("Y/M/d");

$query = "INSERT INTO `ucart` (`uid`,`fid`,`pid`,`date`,`item`,`status`)VALUES ('$uid','$fid','$pid','$mdate','$item','incart')";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "<script type = \"text/javascript\">
					alert(\"Failed to Add Item\");
					window.location = (\"UserCart.php\")
				</script>";
}else {
    echo "<script type = \"text/javascript\">
					alert(\"Item Added To cart\");
					window.location = (\"UserCart.php\")
				</script>";
}
