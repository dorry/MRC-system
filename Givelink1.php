<?php
//Edited to Object Oriented
session_start();
if(!empty($_SESSION))
{
  
}
else
{
  header("Location:index.php");
}
$servername = "localhost";
$username = "id8878100_root";
$password = "fz@ayV3V#@2W!Zd^1qwN";
$dbname = "id8878100_mrc";
$conn = mysqli_connect($servername,$username,$password,$dbname);

if(isset($_POST['Glink_submit']))
{ 
	$R = $_POST['roles'];
	$L = $_POST['link'];

	$sql1 = "SELECT id FROM `usertype` WHERE type='$R'";
	$result1 = mysqli_query($conn, $sql1);
	while ($x = mysqli_fetch_array($result1))
	{
	$RIDs= $x[0];
	}

	$sql = "Insert INTO usertypelinks (typeid,linkid) values('".$RIDs."', '".$L."')";
    mysqli_query($conn,$sql);
           header("Location:index.php");
}