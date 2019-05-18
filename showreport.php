<?php
session_start();
if (empty($_SESSION)) { header("Location:index.php"); }
require_once "doctor.php";
require_once "SharedFacadeUserAndDoctor.php";
include("navbar.php");

$doc= new SharedFacade();
$doc->Doctor->viewreport($_GET['id'],$_SESSION['ID']);
  
include("footer.php"); 

?>
