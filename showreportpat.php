<?php
// session_start();

require_once "doctor.php";
require_once "doctorcontroller.php";
require_once "SharedFacadeUserAndDoctor.php";
require_once "session.php";

if(!empty($_SESSION)){}
else{header("Location:index.php");} 

include("navbar.php"); 

$doc= new SharedFacade();
$doc->Doctor->viewdoctors();

include("footer.php"); ?>