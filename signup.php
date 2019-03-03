<!DOCTYPE html>
<html lang="en">
  <head>

  <link rel="stylesheet" type="text/css" href="assets/css/Signup.css">
<?php 
session_start();

$servername = "localhost";
$username = "id8878100_root";
$password = "fz@ayV3V#@2W!Zd^1qwN";
$dbname = "id8878100_mrc";
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
  </select>
<?php
   }
 ?>
   <span id = City></span>

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
    <footer class="footer-area section-padding">
      <div class="footer-widget">
        <div class="container">
          <div class="row">
            <div class="col-xl-2 col-lg-3">
              <div class="single-widget-home mb-5 mb-lg-0">
                <h3 class="mb-4">top products</h3>
                <ul>
                  <li class="mb-2"><a href="#">managed website</a></li>
                  <li class="mb-2"><a href="#">managed reputation</a></li>
                  <li class="mb-2"><a href="#">power tools</a></li>
                  <li><a href="#">marketing service</a></li>
                </ul>
              </div>
            </div>
            <div class="col-xl-5 offset-xl-1 col-lg-6">
              <div class="single-widget-home mb-5 mb-lg-0">
                <h3 class="mb-4">newsletter</h3>
                <p class="mb-4">
                  You can trust us. we only send promo offers, not a single.
                </p>
                <form action="#">
                  <input
                    type="email"
                    placeholder="Your email here"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Your email here'"
                    required
                  />
                  <button type="submit" class="template-btn">
                    subscribe now
                  </button>
                </form>
              </div>
            </div>
            <div class="col-xl-3 offset-xl-1 col-lg-3">
              <div class="single-widge-home">
                <h3 class="mb-4">instagram feed</h3>
                <div class="feed">
                  <img src="assets/images/feed1.jpg" alt="feed" />
                  <img src="assets/images/feed2.jpg" alt="feed" />
                  <img src="assets/images/feed3.jpg" alt="feed" />
                  <img src="assets/images/feed4.jpg" alt="feed" />
                  <img src="assets/images/feed5.jpg" alt="feed" />
                  <img src="assets/images/feed6.jpg" alt="feed" />
                  <img src="assets/images/feed7.jpg" alt="feed" />
                  <img src="assets/images/feed8.jpg" alt="feed" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-6">
              <span>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <script>
                  document.write(new Date().getFullYear());
                </script>
                All rights reserved | This template is made with
                <i class="fa fa-heart-o" aria-hidden="true"></i> by
                <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </span>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="social-icons">
                <ul>
                  <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-behance"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
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
