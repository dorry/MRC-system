<?php

session_start();
$servername = "localhost";
$username = "id8878100_root";
$password = "fz@ayV3V#@2W!Zd^1qwN";
$dbname = "id8878100_mrc";
$conn = mysqli_connect($servername,$username,$password,$dbname);

if(isset($_POST['link_submit']))
{ 
	$R = $_POST['roles'];
	$L = $_POST['link'];

	$sql1 = "SELECT id FROM `usertype` WHERE type='$R'";
	$result1 = mysqli_query($conn, $sql1);
	while ($x = mysqli_fetch_array($result1))
	{
	$RIDs= $x[0];
	}

	$sql="UPDATE usertypelinks
		  SET linkid = $L
		  WHERE typeid = $RIDs;";
    mysqli_query($conn,$sql);
           header("Location:index.php");
}