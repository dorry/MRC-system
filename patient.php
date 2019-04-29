<?php 
include"user.php";

require_once"mydatabaseconnection.php";
class patient extends user{

public function setviewreport($lid)
{
  $DB=database::getinstance();  
  $result=$DB->updatequery("notifications","isviewed", "true" ,"patid = '$lid'");
}




}
?>