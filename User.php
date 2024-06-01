<?php
include('./COMMON/CommonHeader.php')
?>


<!-- /contact-->
<div class="contact-form py-5" id="contact">
  <div class="container py-lg-5 py-md-4">
    <center>
      <h3 class="hny-title mb-lg-5 mb-4">User Registration</h3>
      <div class="col-lg-7 contacts12-main mb-4">
        <form method="post">
          <div class="main-input">
            <div class="d-grid">
              <input type="text" name="uname" id="w3lName" placeholder="Your Name" maxlength="35" pattern=[a-zA-Z] class="contact-input" required />
              <input type="text" name="uphone" id="w3lPhone" maxlength="10" pattern=[6789][0-9]{9} placeholder="Phone Number" class="contact-input" required />
            </div>
            <div class="d-grid">
              <input type="email" name="uemail" id="w3lSender" placeholder="Your Email id" class="contact-input" required />
              <input type="password" name="password" id="w3lSubject" placeholder="Password" class="contact-input" required />
            </div>
          </div>
          <textarea class="contact-textarea" name="uaddress" id="w3lMessage" placeholder="Address" required></textarea>
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
include('./COMMON/CommonFooter.php')
?>

<?php
include './CONNECTION/DbConnection.php';

if (isset($_REQUEST['register'])) {

  $Name = $_REQUEST['uname'];
  $Phone = $_REQUEST['uphone'];
  $Address = $_REQUEST['uaddress'];
  $Email = $_REQUEST['uemail'];
  $Password = $_REQUEST['password'];

  $qryCheck = "SELECT COUNT(*) AS cnt FROM `user` WHERE `uemail` = '$Email' OR `uphone` = '$Phone'";

  $qryOut = mysqli_query($conn, $qryCheck);

  $fetchData = mysqli_fetch_array($qryOut);

  if ($fetchData['cnt'] > 0) {
    echo "<script>alert('Already exist an Account with same Email / Phone Number');window.location = 'User.php';</script>";
  } else {

    $qryReg = "INSERT INTO `user`(`uname`,`uemail`,`uaddress`,`uphone`)VALUES('$Name','$Email','$Address','$Phone')";
    $qryLog = "INSERT INTO `login`(`reg_id`, `email`, `password`, `type`) VALUES((select max(uid) from `user`), '$Email', '$Password', 'USER')";

    echo $qryReg . "&& " . $qryLog;

    if ($conn->query($qryReg) == TRUE && $conn->query($qryLog) == TRUE) {
      echo "<script>alert('Registration Success');window.location = 'Login.php';</script>";
    } else {
      echo "<script>alert('Registration Failed');window.location = 'User.php';</script>";
    }
  }
}
?>