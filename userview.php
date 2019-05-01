<?php 
require_once 'user.php';
require_once 'reserve.php';
require_once 'reservationdetails.php';
require_once 'radiology.php';
class userview
{


static function navbar(){
   ?>
   <header class="header-area">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 d-md-flex">
                        <h6 class="mr-3"><span class="mr-2"><i class="fa fa-mobile"></i></span> call us now! +1 305 708 2563</h6>
                        <h6 class="mr-3"><span class="mr-2"><i class="fa fa-envelope-o"></i></span> medical@example.com</h6>
                        <h6><span class="mr-2"><i class="fa fa-map-marker"></i></span> Find our Location</h6>
                    </div>
                    <div class="col-lg-3">
                        <div class="social-links">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="header" id="home">
            <div class="container">
                <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a  href="index.php"><img style ="width: auto; max-height: 70px; max-width: 100%; height: auto;"src="assets/images/logo/logo.png" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="index.php">Home</a></li>
                        <li><a href="departments.php">Radiology</a></li>
                        <li><a href="doctors.php">doctors</a></li>
                        
                         <li><a href="about.php">about us</a></li>
                       
                        <li><a href="contact.php">Contact</a></li>
                        <?php
                        if(!empty($_SESSION))
                        {
                            require_once "subjectcontroller.php";
                            $res = new subjectcontroller();
                            echo "<li><a href='ViewProfile.php'>".$_SESSION['username']."</a></li> ";
                            $noti =  $res->notifyobservers();
                            foreach(array_combine($_SESSION['link'],$_SESSION['pagename']) as $links=>$pagenames){
                            echo "<li><a href='".$links."'>".$pagenames."</a></li> ";
                            }
                            echo "<li><a href='signout.php'>SIGNOUT</a></li> ";
                        }
                        else{echo '<li><a href="signin.php">Sign in</a></li>';}
                        ?>                        
                    </ul>
                </nav><!-- #nav-menu-container -->            
                </div>
            </div>
        </div>
    </header>
<?php
}

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