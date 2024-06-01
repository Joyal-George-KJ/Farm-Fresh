<?php
include('./COMMON/CommonHeader.php')
?>


<!-- /contact-->
<div class="contact-form py-5" id="contact">
  <div class="container py-lg-5 py-md-4">
    <center>
      <h3 class="hny-title mb-lg-5 mb-4">Investor Registration</h3>
      <div class="col-lg-7 contacts12-main mb-4">
        <form method="post">
          <div class="main-input">
            <div class="d-grid">
              <input type="text" name="iname" id="w3lName" placeholder="Your Name" class="contact-input" required />
              <input type="text" name="iphone" id="w3lPhone" maxlength="10" pattern=[789][0-9]{9} placeholder="Phone Number" class="contact-input" required />
            </div>
            <div class="d-grid">
              <input type="email" name="iemail" id="w3lSender" placeholder="Your Email id" class="contact-input" required />
              <input type="password" name="password" id="w3lSubject" placeholder="Password" class="contact-input" required />
            </div>
            <input type="text" name="ilicence" id="w3lSubject" maxlength="8" placeholder="Licence" class="contact-input" required />
          </div>
          <textarea class="contact-textarea" name="iaddress" id="w3lMessage" placeholder="Address" required></textarea>
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

  $Name = $_REQUEST['iname'];
  $Phone = $_REQUEST['iphone'];
  $Address = $_REQUEST['iaddress'];
  $Email = $_REQUEST['iemail'];
  $Licence = $_REQUEST['ilicence'];
  $Password = $_REQUEST['password'];

  $qryCheck = "SELECT COUNT(*) AS cnt FROM `investor` WHERE `iemail` = '$Email' OR `iphone` = '$Phone'";

  $qryOut = mysqli_query($conn, $qryCheck);

  $fetchData = mysqli_fetch_array($qryOut);

  if ($fetchData['cnt'] > 0) {
    echo "<script>alert('Already exist an Account with same Email / Phone Number');window.location = 'Investor.php';</script>";
  } else {

    $qryReg = "INSERT INTO `investor`(`iname`,`iemail`,`iaddress`,`iphone`,`ilicence`)VALUES('$Name','$Email','$Address','$Phone','$Licence')";
    $qryLog = "INSERT INTO `login`(`reg_id`, `email`, `password`, `type`) VALUES((select max(i_id) from `investor`), '$Email', '$Password', 'INVESTOR')";

    echo $qryReg . "&& " . $qryLog;

    if ($conn->query($qryReg) == TRUE && $conn->query($qryLog) == TRUE) {
      echo "<script>alert('Registration Success');window.location = 'Login.php';</script>";
    } else {
      echo "<script>alert('Registration Failed');window.location = 'Investor.php';</script>";
    }
  }
}
?>