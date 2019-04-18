
<head>

  <link rel="stylesheet" type="text/css" href="assets/css/Signup.css">
<?php 
//where should we put this query ? in which class!!
session_start();
include("address.php");
require_once"mydatabaseconnection.php";
include("navbar.php");
?>
  
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
<?php
$address = new address();
$address->retriveforsignup();
 ?>
 
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
  


    <!-- Footer Area Starts -->
    <?php include("footer.php"); ?>


  </body>
</html>
