
<head>
  <link rel="stylesheet" type="text/css" href="assets/css/Signup.css">
<?php 
require_once("address.php");
require_once"mydatabaseconnection.php";
include("navbar.php");
require_once "usercontroller.php";
require_once "SharedFacadeUserAndDoctor.php";

$Cs = array();
// $c = new usercontroller();
// $c->viewsignup();
$user= new SharedFacade();
$user->User->viewsignup();
?>

  


    <!-- Footer Area Starts -->
    <?php include("footer.php"); ?>


  </body>
</html>
