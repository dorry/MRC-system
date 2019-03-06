<?php
include"mydatabaseconnection.php";

class useroptions
{
public $type;
public $name;
public $id;



static function adduseroptions ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
	$sql = "Insert INTO useroptions (name,type) values('".$R."','".$D."')";
    mysqli_query($conn,$sql);
	header("Location:UTD.php");
	echo "<script>alert('A New Option  has been created')</script>";
}


static function edituseroptions ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}

static function deleteuseroptions ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}


}
?>