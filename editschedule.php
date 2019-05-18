 <head>

  <link rel="stylesheet" type="text/css" href="assets/css/Signup.css">
<?php 
session_start();
require_once("user.php");
require_once("usertype.php");
require_once("address.php");
require_once("admincontroller.php");
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
$c = new admincontroller();
$c->showeditschform();
?>

     <input type="submit" name="doeditschedule" value="Edit User" />
 
 </form>
 </div>  
</div>
  
    <?php include("footer.php"); ?>

  </body>
</html>
