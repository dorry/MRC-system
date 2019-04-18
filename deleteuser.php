
<head>

  <link rel="stylesheet" type="text/css" href="assets/css/Signup.css">
<?php 
//where should we put this query ? in which class!!
session_start();
include("user.php");
include("address.php");
require_once("usercontroller.php")


?>

    <title>Delete User</title>

  </head>
  <body>

    <?php include("navbar.php"); ?>
 
<div id="login-box">
  <div class="left">
    <form action="admincontroller.php" method="POST">
    <h3>Delete User</h3>
<?php
$c = new usercontroller();
$c->viewdropdown();

?>
  

    <input type="submit" name="doadmindeleteuser" value="Delete User" />
 
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

  

  </body>
</html>
