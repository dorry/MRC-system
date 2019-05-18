<?php
require_once"mydatabaseconnection.php";

class rnoti
{
	public static function addnotification($nid,$lid)
	{
		  $DB=database::getinstance();  
		  $reuslt = $DB->insertquery("recievednoti", "NID , RecieverID" , " '$nid','$lid'");
	}

}