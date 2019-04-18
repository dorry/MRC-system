<?php
//Not Edited to Object Oriented

require_once"mydatabaseconnection.php";
require_once"usercontroller.php";
require_once"usertypeoptionscontroller.php";
require_once"useroptionscontroller.php";
  
  $DB=new database();
  $conn=$DB->DBC();
    
$RIDs = $_REQUEST["e"];
$c = new usercontroller();
$c->viewdropdowneav($RIDs);
$c2 = new useroptionscontroller();
$c2->viewoptionseav($RIDs);
?>


