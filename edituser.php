<!DOCTYPE html>
<html lang="en">
  <head>

  <link rel="stylesheet" type="text/css" href="assets/css/Signup.css">
<?php 
//where should we put this query ? in which class!!
session_start();
include("user.php");
include("address.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mrc";
$conn = mysqli_connect($servername,$username,$password,$dbname);
$Cs = array();

?>
    <!-- Required Meta Tags -->
    <!-- Page Title -->
    <title>Sign Up</title>
    <!-- Favicon -->
    <!-- CSS Files -->
    
  </head>
  <body>
    <!-- Preloader Starts -->
    <div class="preloader">
      <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
      <?php include("navbar.php"); ?>
    <!-- Header Area End -->

    <!-- Banner Area Starts -->
    <section class="banner-area other-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
<div id="login-box">
  <div class="left">
    <form action="doedituser.php" method="POST">
    <h3>Edit User</h3>
<?php
$user = new user();
$user->retriveforlinks();
?>

    <input type="text" name="FName" placeholder="First Name" />
    <input type="text" name="LName" placeholder="Last Name" />
    <input type="text" name="UName" placeholder="Username" />
    <input type="text" name="email" placeholder="E-mail" />
    <input type="text" name="SSN" placeholder="Social Security Number" />
    <input type="radio" name="gender" value="male" checked> Male 
    <input type="radio" name="gender" value="female"> Female<br>  <br> 
    <input type="date" name="DOB"><br> <br>
    <input type="password" name="password" placeholder="Password"/>
    <input type="password" name="password2" placeholder="Retype password" />

    <label>Country</label>
<?php
$address = new address();
$address->retriveforsignup();
 ?>
 
   <div id = City></div>
    <input type="submit" name="signup_submit" value="Edit User" />
 
 </form>
  </div>
  
</div>

            <a href="index.html">Home</a> <span>|</span>
            <a href="signup.html">Sign Up</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Banner Area End -->
    <!-- Welcome Area Starts -->
    <!-- Welcome Area End -->
    <!-- Patient Area Starts -->
    <!-- Patient Area Starts -->




    <!-- Footer Area Starts -->
    <?php include("footer.php"); ?>
    <!-- Footer Area End -->

    <!-- Javascript -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <!-- <script src="assets/js/vendor/jquery.nice-select.min.js"></script> -->
    <script src="assets/js/vendor/superfish.min.js"></script>
    <script src="assets/js/main.js"></script>


  </body>
</html>