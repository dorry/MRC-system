<?php
require_once"mydatabaseconnection.php";
$DB=new database();
$conn=$DB->DBC();

session_start();
if(!empty($_SESSION))
{
  
}
else
{
  header("Location:index.php");
}


 ?>