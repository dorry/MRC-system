<?php

$servername = "localhost";
$username = "id8878100_root";
$password = "fz@ayV3V#@2W!Zd^1qwN";
$dbname = "id8878100_mrc";
$conn = mysqli_connect($servername,$username,$password,$dbname);
 

if(isset($_POST['signup_submit'])){ 
	
if($_POST['password'] = $_POST['password2']){

	$F = $_POST['FName'];
	$L = $_POST['LName'];
	$U = $_POST['UName'];
	$E = $_POST['email'];
    $P = $_POST['password'];
	$G = $_POST['gender'];
	$S = $_POST['SSN'];
	$D = $_POST['DOB'];
	$C = $_POST['City'];
	$sql7 = "SELECT id FROM `address` WHERE name='$C'";
	$result7 = mysqli_query($conn, $sql7);
	while ($x = mysqli_fetch_array($result7)) {
	$CIDs= $x[0];
	}
//=========================================================================================

	$sql = "Insert INTO user (firstname,lastname,username,email,Password,usertypeid,addressid,socialnumber,dob)  	
 	values('".$F."','".$L."','".$U."','".$E."','".$P."','2','".$CIDs."','".$S."','".$D."')" ;
    mysqli_query($conn,$sql);
           header("Location:index.php");


}
else{

echo "<script>alert('Passwords written are not the same')</script>";
           header("Location:index.php");

}




}

 ?>
