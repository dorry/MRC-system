<?php
include("Radiology.php");
session_start();
if(!empty($_SESSION))
{

  $ID = $_POST['rad'];
  $Rad = new radiology();
  $Rad->id = $ID;
  $Rad->deleteradiology($Rad); 
}
else
{
  header("Location:index.php");
}
// $servername = "localhost";
// $username = "https://mrcv1.000webhostapp.com/signin.html";
// $pasword = "fz@ayV3V#@2W!Zd^1qwN";
// $dbname = "id8878100_mrc";
// $conn = new mysqli ($servername, $username, $pasword, $dbname);
