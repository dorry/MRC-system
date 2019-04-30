<?php
require_once"mydatabaseconnection.php";

class notification
{



public static function addnotification($lid,$rid)
{
	  $DB=database::getinstance();  
	  $r = $DB->insertlast("notification", "SenderID" , "'$lid'");
	  $reuslt1 = $DB->insertquery("recievednoti", "NID , RecieverID" , " '$r','$rid'");

}



}