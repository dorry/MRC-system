<?php 
require_once 'user.php';
require_once 'usercontroller.php';
require_once 'reserve.php';
require_once 'reservationdetails.php';
require_once 'radiology.php';
class userview
{
    static function navbar()
    {
    ?>
    <header class="header-area">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 d-md-flex">
                            <h6 class="mr-3"><span class="mr-2"><i class="fa fa-mobile"></i></span> call us now! 19773</h6>
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
        <form action='usercontroller.php' method='post'>
            FirstName:<span style= "color:red;">*</span>
            <input type='text' value="<?php echo $result[$i]['firstname'];?>" name='FName' required = ""><span style= "font-size:10px;">First Name must contain letters and spaces only.</span><br><br>
            LastName:<span style= "color:red;">*</span>
            <input type='text' value="<?php echo $result[$i]['lastname'];?>" name='LName' required = ""><span style= "font-size:10px;">Last Name must contain letters and spaces only.</span><br><br>
            Email:<span style= "color:red;">*</span> <br><br>
            <input type='email' value="<?php echo $result[$i]['email'];?>" name='Email' required = ""><br><br><span style= "font-size:10px;">E-mail should be like this format: example@gmail.com</span><br><br>
            Password:<span style= "color:red;">*</span>
            <input type='text' value='' name='Password' required = ""><span style= "font-size:10px;">Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit.</span><br><br>
            Social Security Number:<span style= "color:red;">*</span> <br><br>
            <input type='number' value="<?php echo $result[$i]['socialnumber'];?>"name='socialnumber' required = ""><br><br><span style= "font-size:10px;">Social Number Should be 14 digits.</span><br><br>
            Date of birth:<span style= "color:red;">*</span><br><br>
            <input type='date' value="<?php echo $result[$i]['dob'];?>"name='dob' required = "" max = "2003-01-01"><br><br><span style= "font-size:10px;">Select your Date of Birth.</span><br><br>
            Username:<span style= "color:red;">*</span> 
            <input type='text' value="<?php echo $result[$i]['username'];?>" name='username' required = ""><span style= "font-size:10px;">Username must be bigger that 5 chars and contain only digits, letters and underscore.</span><br>
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
                echo'<span><b> Gender:</b></span> '; echo $result[$i]['gender']; echo '<br>'; 
                echo'<span><b>Username: </b></span>'; echo $result[$i]['username']; echo '<br>'; 
                echo'<span><b>Date Of Birth: </b></span>'; echo $result[$i]['dob']; echo '<br>';            
            ?> </h4>
            <?php
            }
    }

    static function signinform()
{
    ?>
         
    <style type="text/css">@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);
    *:focus {
      outline: none;
    }
    body {
      margin: 0;
      padding: 0;
      font-size: 16px;
      color: #222;
      font-family: 'Roboto', sans-serif;
      font-weight: 300;
    }

    #login-box {
      position: relative;
      margin: 5% auto;
      width: 600px;
      height: 450px;
      border-radius: 2px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
    }

    .left {
      position: absolute;
      top: 0;
      left: 0;
      box-sizing: border-box;
      padding: 40px;
      width: 300px;
      height: 400px;
    }

    h1 {
      margin: 0 0 20px 0;
      font-weight: 300;
      font-size: 28px;
    }

    input[type="text"],
    input[type="password"] {
      display: block;
      box-sizing: border-box;
      margin-bottom: 20px;
      padding: 4px;
      width: 220px;
      height: 32px;
      border: none;
      border-bottom: 1px solid #AAA;
      font-family: 'Roboto', sans-serif;
      font-weight: 400;
      font-size: 15px;
      transition: 0.2s ease;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      transition: 0.2s ease;
    }

    input[type="submit"] {
      margin-top: 28px;
      width: 120px;
      height: 32px;
      background:  linear-gradient(to right, #244cfd, #15e4fd);
      border: none;
      border-radius: 2px;
      color: #FFF;
      font-family: 'Roboto', sans-serif;
      font-weight: 500;
      text-transform: uppercase;
      transition: 0.1s ease;
      cursor: pointer;
    }

    input[type="submit"]:hover,
    input[type="submit"]:focus {
      opacity: 0.8;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
      transition: 0.1s ease;
    }

    input[type="submit"]:active {
      opacity: 1;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
      transition: 0.1s ease;
    }

    .or {
      position: absolute;
      top: 180px;
      left: 280px;
      width: 40px;
      height: 40px;
      background: #DDD;
      border-radius: 50%;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
      line-height: 40px;
      text-align: center;
    }

    .right {
      position: absolute;
      top: 0;
      right: 0;
      box-sizing: border-box;
      padding: 40px;
      width: 300px;
      height: 400px;
      background: url('https://goo.gl/YbktSj');
      background-size: cover;
      background-position: center;
      border-radius: 0 2px 2px 0;
    }

    .right .loginwith {
      display: block;
      margin-bottom: 40px;
      font-size: 30px;
      color: black;
      text-align: center;
      font-weight: bold;
    }

    button.social-signin {
      margin-bottom: 20px;
      width: 220px;
      height: 36px;
      border: none;
      border-radius: 2px;
      color: #FFF;
      font-family: 'Roboto', sans-serif;
      font-weight: 500;
      transition: 0.2s ease;
      cursor: pointer;
    }

    button.social-signin:hover,
    button.social-signin:focus {
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
      transition: 0.2s ease;
    }

    button.social-signin:active {
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
      transition: 0.2s ease;
    }

    button.social-signin.facebook {
      background: #32508E;
    }

    button.social-signin.twitter {
      background: #55ACEE;
    }

    button.social-signin.google {
      background: #DD4B39;
    }</style>
        <div id="login-box">
        <div class="left">
        <h1>Sign In</h1>
        <form action="usercontroller.php" method="POST">
        <span style= "color:red;padding-left:100%;">*</span><input type="text" name="username" placeholder="Username" required = ""/>
        <span style= "color:red;padding-left:100%;">*</span><input type="password" name="password" placeholder="Password" required = ""/>
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

    static function signupform()
{
        ?>
        <div id="login-box">
        <div class="left">
        <form action="usercontroller.php" method="POST">
        <h1>Sign Up</h1>
        <span style= "color:red;padding-left:100%;">*</span><input type="text" name="FName" placeholder="First Name" required = ""/><span style= "font-size:10px;">First Name must contain letters and spaces only.</span>
        <span style= "color:red;padding-left:100%;">*</span><input type="text" name="LName" placeholder="Last Name" required = ""/><span style= "font-size:10px;">Last Name must contain letters and spaces only.</span>
        <span style= "color:red;padding-left:100%;">*</span><input type="text" name="UName" placeholder="Username" required = ""/><span style= "font-size:10px;">Username must be bigger that 5 chars and contain only digits, letters and underscore.</span>
        <span style= "color:red;padding-left:80%;">*</span><input type="email" name="email" placeholder="E-mail" required = ""/><br><span style= "font-size:10px;">E-mail should be like this format: example@gmail.com</span><br>
        <span style= "color:red;padding-left:80%;">*</span><input type="number" name="SSN" placeholder="Social Security Number" required = ""/><br><span style= "font-size:10px;">Social Number Should be 14 digits.</span><br><br>
        <span style= "color:red;">*</span><input type="radio" name="gender" value="male" checked required = ""> Male 
        <input type="radio" name="gender" value="female" required = ""> Female<br>  <br> 
        <span style= "color:red;padding-left:70%;">*</span><input type="date" name="DOB" max = "2003-01-01"><br><span style= "font-size:10px;">Select your Date of Birth.</span><br>
        <span style= "color:red;padding-left:100%;">*</span><input type="password" name="password" placeholder="Password" required = ""/><span style= "font-size:10px;">Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit.</span>
        <span style= "color:red;padding-left:100%;">*</span><input type="password" name="password2" placeholder="Retype password" required = ""/>

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