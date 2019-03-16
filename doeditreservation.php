<?php
include("reserve.php");
session_start();
if(!empty($_SESSION))
{
  $Date = $_POST['date'];
  $dr = $_POST['doc'];
  $radid = $_POST['rad'];
  $Resid = $_POST['reserve'];
  $resd = new reservationdetails();
  $res = new reserve();
  $res->doctorid=$dr;
  $res->date = $Date;
  $resd->id = $Resid;
  $resd->radiologyid = $radid;
  $res->editreserve($res,$resd);  
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

