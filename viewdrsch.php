<?php
session_start();
if (empty($_SESSION)) { header("Location:index.php"); }

include("navbar.php"); 

require_once("admincontroller.php");
$c= new admincontroller();
$c->showdoctorsch();
 include("footer.php"); ?>
  
  </body>
</html>
