<?php
include"mydatabaseconnection.php";

class usertype
{
public $type;
public $id;


static function addusertype($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
    $sql = "Insert INTO usertype (type) values('".$R."')";
    mysqli_query($conn,$sql);
    echo "<script>alert('A New role  has been created')</script>";
    header("Location:index.php");
}


static function editusertype ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}

static function deleteusertype ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}


}
?>