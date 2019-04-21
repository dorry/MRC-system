<?php 
require_once 'user.php';
require_once 'reserve.php';
require_once 'reservationdetails.php';
require_once 'radiology.php';
class userview
{


static function signinform(){
		?>
  <div id="login-box">
  <div class="left">
    <h1>Sign In</h1>
    <br><br><br>
    <form action="usercontroller.php" method="POST">
    <input type="text" name="username" placeholder="Username" />
    <input type="password" name="password" placeholder="Password" />
    <span>Don't have an account?</span> <a href="signup.php"> Create one</a>
    <br>
      <input type="submit" name="signin_submit" value="Sign me in" />
  </form>
  </div>
  <div class="right">
<br><br><br><br>    
    <button class="social-signin facebook">Log in with facebook</button>
    <button class="social-signin twitter">Log in with Twitter</button>
    <button class="social-signin google">Log in with Google+</button>
  </div>
  <div class="or">OR</div>
</div>
<?php
	}

   static function signupform(){
   	?>
   	<div id="login-box">
  <div class="left">
    <form action="usercontroller.php" method="POST">
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
   <?php
   }

}
?>