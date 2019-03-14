<?php
//Edited to Object Oriented
include"usertype.php";
include"links.php"; 
$R = $_POST['role'];
$L = $_POST['link'];
$usertype = new usertype();
$links = new links();

$usertype->id = $R;
$links->id= $L;
$links->addlink($links,$usertype);
	


/*
	$sql1 = "SELECT id FROM `usertype` WHERE type='$R'";
	$result1 = mysqli_query($conn, $sql1);
	while ($x = mysqli_fetch_array($result1))
	{
	$RIDs= $x[0];
	}
*
	$sql = "Insert INTO usertypelinks (typeid,linkid) values('".$RIDs."', '".$L."')";
    mysqli_query($conn,$sql);
           header("Location:index.php");
}*/

?>