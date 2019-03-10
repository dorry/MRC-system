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
$pasword = "fz@ayV3V#@2W!Zd^1qwN";
$dbname = "id8878100_mrc";
// create connection
$conn = new mysqli ($servername, $username, $pasword, $dbname);

if(isset($_POST['option_submit']))
{ 
	$R = $_POST['roleid'];
	$O = $_POST['option'];
	echo $R;
	echo $O;
	
	$sql2 = "SELECT id FROM usertype WHERE type='$R'";
	$result2 = mysqli_query($conn, $sql2);
	while ($x = mysqli_fetch_array($result2))
	{
	$RIDs= $x[0];
	}

	$sql1 = "SELECT id FROM useroptions WHERE name='$O'";
	$result1 = mysqli_query($conn, $sql1);
	while ($x = mysqli_fetch_array($result1))
	{
	$OIDs= $x[0];
	}

	$sql = "Insert INTO usertypeoptions (userTypeId,optionsId) values('".$RIDs."','".$OIDs."')";
    mysqli_query($conn,$sql);
    	   header("Location:UTD.php");
	       echo "<script>alert('A New Option  has been add to a usertype')</script>";

}