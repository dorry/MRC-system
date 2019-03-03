<?php

session_start();
$servername = "localhost";
$username = "id8878100_root";
$pasword = "fz@ayV3V#@2W!Zd^1qwN";
$dbname = "id8878100_mrc";
// create connection
$conn = new mysqli ($servername, $username, $pasword, $dbname);

if(isset($_POST['option_submit']))
{ 
	$R = $_POST['name'];
	$D = $_POST['datatype'];
	$sql = "Insert INTO useroptions (name,type) values('".$R."','".$D."')";
    mysqli_query($conn,$sql);
           header("Location:UTD.php");
	       echo "<script>alert('A New Option  has been created')</script>";

}