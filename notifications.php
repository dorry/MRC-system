<?php
require_once"mydatabaseconnection.php";

class notifications
{



public static function addresnot($resid,$drid,$pid)
{

	  $DB=database::getinstance();  
	  $reuslt = $DB->insertquery("notifications", "resid,uid,patid" , "'$resid','$drid','$pid'");
	  $reuslt = $DB->insertquery("notifications", "resid,uid,patid" , "'$resid','2','$pid'");


}


public static function addrepnot($resid,$drid,$pid)
{

	  $DB=database::getinstance();  
	  $reuslt = $DB->insertquery("notifications", "reportid,uid,patid" , "'$resid','$drid','$pid'");

}





}