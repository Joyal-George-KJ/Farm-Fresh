<?php
include 'Adminheader.php';
// include '../CONNECTION/DbConnection.php';
?>


<!-- /contact-->
<div class="contact-form py-5" id="contact">
  <div class="container py-lg-5 py-md-4">
    <center>
      <h3 class="hny-title mb-lg-5 mb-4">Delivery Boy Registration</h3>
      <div class="col-lg-7 contacts12-main mb-4">
        <form method="post">
          <div class="main-input">
            <div class="d-grid">
              <input type="text" name="sname" id="w3lName" placeholder="Your Name" class="contact-input" required />
              <input type="text" name="sphone" id="w3lPhone" maxlength="10" pattern=[789][0-9]{9} placeholder="Phone Number" class="contact-input" required />
            </div>
            <div class="d-grid">
              <input type="email" name="semail" id="w3lSender" placeholder="Your Email id" class="contact-input" required />
              <input type="password" name="password" id="w3lSubject" placeholder="Password" class="contact-input" required />
            </div>
            <input type="text" name="slicence" id="w3lSubject" maxlength="8" placeholder="Licence" class="contact-input" required />
          </div>
          <textarea class="contact-textarea" name="saddress" id="w3lMessage" placeholder="Address" required></textarea>
          <div class="text">
            <button class="btn btn-style btn-secondary btn-contact" name="register">Submit</button>
          </div>
        </form>
      </div>
    </center>
  </div>
</div>
<!--//contact-->

<?php
include('../COMMON/CommonFooter.php')
?>

<?php
include '../CONNECTION/DbConnection.php';

if (isset($_REQUEST['register'])) {

  $Name = $_REQUEST['sname'];
  $Phone = $_REQUEST['sphone'];
  $Address = $_REQUEST['saddress'];
  $Email = $_REQUEST['semail'];
  $Licence = $_REQUEST['slicence'];
  $Password = $_REQUEST['password'];

  $qryCheck = "SELECT COUNT(*) AS cnt FROM `delivery_boy` WHERE `bemail` = '$Email' OR `bphone` = '$Phone'";

  $qryOut = mysqli_query($conn, $qryCheck);

  $fetchData = mysqli_fetch_array($qryOut);

  if ($fetchData['cnt'] > 0) {
    echo "<script>alert('Already exist an Account with same Email / Phone Number');window.location = 'Seller.php';</script>";
  } else {

    $qryReg = "INSERT INTO `delivery_boy`(`bname`,`bemail`,`baddress`,`bphone`,`blicence`)VALUES('$Name','$Email','$Address','$Phone','$Licence')";
    $qryLog = "INSERT INTO `login`(`reg_id`, `email`, `password`, `type`,`status`) VALUES((select max(`id`) from `delivery_boy`), '$Email', '$Password', 'Dboy','approved')";

    echo $qryReg . "&& " . $qryLog;

    if ($conn->query($qryReg) == TRUE && $conn->query($qryLog) == TRUE) {
      echo "<script>alert('Registration Success');window.location = 'AddDBoy.php';</script>";
    } else {
      echo "<script>alert('Registration Failed');window.location = 'AddDBoy.php';</script>";
    }
  }
}
?>