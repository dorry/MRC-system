<?php
 
 session_start();
require_once("navbar.php");
require_once("admincontroller.php");


$c = new admincontroller();
$c->showcreatedrsch();
$c->DoctorDropdown();
$c->showcreatedrsch2();

?>
<?php require_once'footer.php';

?>