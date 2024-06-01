<?php
session_start();
include('./COMMON/CommonHeader.php')
?>


<!-- /contact-->
<div class="contact-form py-5" id="contact">
  <div class="container py-lg-5 py-md-4">
    <center>
      <h3 class="hny-title mb-lg-5 mb-4">Login</h3>
      <div class="col-lg-7 contacts12-main mb-5">
        <form method="post">

          <div class="main-input">
            <div class="d-grid">
              <input type="email" name="email" id="w3lSender" placeholder="Email id" class="contact-input" required />
              <input type="password" name="password" id="w3lSubject" placeholder="Password" class="contact-input" required title="Capital Letter, Small Letter, Special Charater, Numbers" />
            </div>
          </div>
          <div class="text">
            <button name="login" class="btn btn-style btn-secondary btn-contact">Login</button>
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

if (isset($_REQUEST['login'])) {
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];
  $qry = "SELECT * FROM login WHERE `email` = '$email' AND `password` = '$password' AND `status`='approved'";
  $result = mysqli_query($conn, $qry);
  if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $uid = $data['reg_id'];
    $type = $data['type'];

    $_SESSION['uid'] = $uid;
    $_SESSION['type'] = $type;

    if ($type == 'ADMIN') {
      echo "<script>alert('Welcome to AdminHome '); window.location='ADMIN/adminHome.php'</script>";
    } else  if ($type == 'Dboy') {
      echo "<script>alert('Welcome to delivery boy Home'); window.location='Dboy/Dboyhome.php'</script>";
    } else if ($type == 'FARMER') {
      echo "<script>alert(' Welcome to Farmerhome '); window.location='FARMER/FarmerHome.php'</script>";
    } else if ($type == 'USER') {
      echo "<script>alert('Welcome UserHome'); window.location='USER/UserHome.php'</script>";
    } else if ($type == 'INVESTOR') {
      echo "<script>alert('Welcome InvestorHome'); window.location='INVESTOR/InvestorHome.php'</script>";
    } else {
      echo "<script>alert('Login Failed')</script>";
    }
  } else {
    echo "<script>alert('Invalid Email / Password'); window.location='login.php'</script>";
  }
}
?>