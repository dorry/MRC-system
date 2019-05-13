<?php
session_start();
if(!empty($_SESSION)){}
else{header("Location:index.php");}
?>
  <head>
    <title>Admin Panel</title>
  </head>
  <body>
    <?php include("navbar.php");
     require_once("user.php"); ?>
<div>
  <h2>View Profile: </h2>
<?php  
require_once"usercontroller.php";
$user= new SharedFacade();
$user->User->viewmyprofile($_SESSION['ID']);
?>
</div>
  <?php include("footer.php"); ?>
  </body>
</html>
