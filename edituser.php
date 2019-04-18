 <head>

  <link rel="stylesheet" type="text/css" href="assets/css/Signup.css">
<?php 
session_start();
require_once("user.php");
require_once("usertype.php");
require_once("address.php");
require_once("usercontroller.php");
require_once("usertypecontroller.php");
?>
   
    <title>Edit User</title>

    
  </head>
  <body>
  
      <?php include("navbar.php"); ?>
<div id="login-box">
  <div class="left">
    <form action="admincontroller.php" method="POST">
    <h3>Edit User</h3>
<?php
$c = new usercontroller();
$c->viewdropdown();
$c->showedituser();

$c2 = new usertypecontroller();
$c2->viewdropdown();
?>

     <input type="submit" name="admindoedituser" value="Edit User" />
 
 </form>
 </div>
  
</div>

            <a href="index.html">Home</a> <span>|</span>
            <a href="signup.html">Sign Up</a>     
    <?php include("footer.php"); ?>

  </body>
</html>
