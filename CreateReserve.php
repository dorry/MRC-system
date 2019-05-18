<?php
//session_start();
require_once "reserve.php";
require_once "reservecontroller.php";

if (empty($_SESSION)) { header("Location:index.php"); }
?>
<?php
$reserve=new reservecontroller();
$reserve->viewreserveform();
$reserve->showdocdropdown();
$reserve->viewreservedropdownrad();
?>
  <?php include("footer.php"); ?>
