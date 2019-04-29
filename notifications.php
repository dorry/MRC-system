<?php
require_once"mydatabaseconnection.php";

class notifications
{



public static function addresnot($resid,$uid)
{

	  $DB=database::getinstance();  
	  $reuslt = $DB->insertquery("notifications", "resid,uid" , "'$resid','$uid'");
	  $reuslt = $DB->insertquery("notifications", "resid,uid" , "'$resid','2'");


}





}