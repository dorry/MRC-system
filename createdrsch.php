<?php
 
 session_start();
require_once("admincontroller.php");


$c = new admincontroller();
$c->showcreatedrsch();
$c->DoctorDropdown();
$c->showcreatedrsch2();
require_once'footer.php';

?>