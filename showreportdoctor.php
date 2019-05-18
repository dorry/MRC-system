<?php
require_once "doctor.php";
require_once "SharedFacadeUserAndDoctor.php";
require_once "session.php";
require_once("navbar.php"); 
if (empty($_SESSION)) { header("Location:index.php"); }

$doc= new SharedFacade();
$doc->Doctor->viewpatients();
  
include("footer.php"); ?>