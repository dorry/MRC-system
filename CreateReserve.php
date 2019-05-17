<?php
//session_start();
require_once "reserve.php";
require_once "reservecontroller.php";
?>
<?php
$reserve=new reservecontroller();
$reserve->viewreserveform();
$reserve->showdocdropdown();
$reserve->viewreservedropdownrad();
?>
  <?php include("footer.php"); ?>
