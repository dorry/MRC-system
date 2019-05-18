<?php 

require_once "session.php";
require_once "doctor.php";
require_once "doctorcontroller.php";
require_once "reportcontroller.php";
include("navbar.php");
if(!isset($_SESSION)){session_start();}
if (empty($_SESSION)) { header("Location:index.php"); }

$doc = new reportcontroller();
$doc->viewrepatientsdropdowndoc();
$doc->viewraddropdowndoc();
$doc->viewformreport();

include("footer.php"); ?>


  </body>
</html>
