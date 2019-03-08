<!DOCTYPE html>
<html lang="en">
  <head>

  <link rel="stylesheet" type="text/css" href="assets/css/Signup.css">
<?php 
//where should we put this query ? in which class!!
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mrc";
$conn = mysqli_connect($servername,$username,$password,$dbname);

$Cs = array();
$sql3 = "SELECT  name  FROM `address` where pid = 0";
$result3 = mysqli_query($conn, $sql3);
while ($x = mysqli_fetch_array($result3)) {
    global $Cs;
array_push($Cs, $x[0]);

}


$CIs = array();
$sql4 = "SELECT  name  FROM `address` where pid = 1";
$result4 = mysqli_query($conn, $sql4);
while ($x = mysqli_fetch_array($result4)) {
    global $CIs;
array_push($CIs, $x[0]);
}
$CIDs = 0;

$CityIDs = array();
$sql5 = "SELECT  id  FROM `address` where pid = 1";
$result5 = mysqli_query($conn, $sql5);
while ($x = mysqli_fetch_array($result5)) {
    global $CityIDs;
array_push($CityIDs, $x[0]);
}


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
    <form action="signup1.php" method="POST">
    <h1>Sign Up</h1>
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
  <select name = "Country" onchange="test(this.value)">
    <option selected=""></option>
  <?php 
    for ($x = 0; $x <count($Cs); $x++)    
    {
    ?>
   <option value = "<?php echo $Cs[$x];?>"> <?php echo $Cs[$x];?> </option>  
    <br> 
<?php
   }
 
 ?>
   </select>

   <div id = City></div>

    <input type="submit" name="signup_submit" value="Sign me up" />
 </form>
  </div>
  
  <div class="right">
<br><br><br><br>    
    <button class="social-signin facebook">Sign up with facebook</button>
    <button class="social-signin twitter">Sign Up with Twitter</button>
    <button class="social-signin google">Sign Up with Google+</button>
  </div>
  <div class="or">OR</div>
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
<script type="text/javascript">
  
function test(val){

  var xhttp;
  if (val.length == 0) { 
    document.getElementById("City").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("City").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "getcity.php?e="+val, true);
  xhttp.send();  
}

</script>


  </body>
</html>
