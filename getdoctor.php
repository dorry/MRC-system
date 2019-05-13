<?php
//Not Edited to Object Oriented

require_once"mydatabaseconnection.php";
require_once"reservecontroller.php";
  
    
$doc = $_REQUEST["doctors"];
$c = new reservecontroller();
$c->viewreservedropdowndoc($doc);
?>
