<?php

session_start();
if(!empty($_SESSION))
{
  
}
else
{
  header("Location:index.php");
}
$servername = "localhost";
$username = "https://mrcv1.000webhostapp.com/signin.html";
$pasword = "fz@ayV3V#@2W!Zd^1qwN";
$dbname = "id8878100_mrc";
// create connection
$conn = new mysqli ($servername, $username, $pasword, $dbname);

if(isset($_POST['type_submit']))
{ 
	$R = $_POST['name'];
	$sql = "Insert INTO usertype (type) values('".$R."')";
    mysqli_query($conn,$sql);
    echo "<script>alert('A New role  has been created')</script>";
           header("Location:index.php");

}