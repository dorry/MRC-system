<?php 
require_once 'user.php';
require_once 'reserve.php';
require_once 'reservationdetails.php';
require_once 'radiology.php';
class userview
{


static function showprofileedit($lid)
{
    $result = user::RetrieveProfileForUser($lid);
    $length =  count($result);
   for ($i=0; $i<$length;$i++)
    { 

        ?>  
    <form action='' method='post'>
         FirstName:
        <input type='text' value="<?php echo $result[$i]['firstname'];?>" name='FName'><br>
         LastName:
        <input type='text' value="<?php echo $result[$i]['lastname'];?>" name='LName' ><br>
         Email: 
        <input type='text' value="<?php echo $result[$i]['email'];?>" name='Email'><br>
        Password: 
        <input type='text' value='' name='Password'><br>
        Social Security Number: 
        <input type='text' value="<?php echo $result[$i]['socialnumber'];?>"name='socialnumber'><br>
        Date of birth:
        <input type='text' value="<?php echo $result[$i]['dob'];?>"name='dob'><br>
        username: 
        <input type='text' value="<?php echo $result[$i]['username'];?>" name='username'><br> 
        <input type='submit' value='edit' name='edit' class='template-btn mt-3'><br> 
        </form> ;
<?php

        }
  } 
static function showprofile($lid)
{
    $result = user::RetrieveProfileForUser($lid);
    $length =  count($result);
   for ($i=0; $i<$length;$i++)
    { 
?>
           <h4 value = "<?php echo $result[$i]['id'];?>">
            <?php
             echo'<span><b> Full Name: </b></span>';echo $result[$i]['firstname'];echo ' ';  echo $result[$i]['lastname']; echo '<br>'; 
             echo'<span><b>Social Number: </b><span>'; echo $result[$i]['socialnumber']; echo '<br>'; 
             echo'<span><b>Email: </b></span>'; echo $result[$i]['email']; echo '<br>'; 
             echo'<span><b> Password:</b></span> '; echo $result[$i]['password']; echo '<br>'; 
             echo'<span><b>Username: </b></span>'; echo $result[$i]['username']; echo '<br>'; 
             echo'<span><b>Date Of Birth: </b></span>'; echo $result[$i]['dob']; echo '<br>';            
           ?> </h4>  

<?php

        } 

} 

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