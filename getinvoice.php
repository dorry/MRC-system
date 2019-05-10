<?php
//Not Edited to Object Oriented

require_once"mydatabaseconnection.php";
require_once"receptioncontroller.php";
require_once"usertypeoptionscontroller.php";
require_once"useroptionscontroller.php";
  
    
$RIDs = $_REQUEST["e"];
$c = new receptionistcontroller();
$array = $c->viewinvoice($RIDs);
?>


