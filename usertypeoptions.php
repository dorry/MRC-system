<?php
include"mydatabaseconnection.php";

class usertypeoptions
{
public $usertypeid;
public $optionsid;
public $id;



static function addusertypeoptions ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    
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


static function editusertypeoptions ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}

static function deleteusertypeoptions ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}


}
?>