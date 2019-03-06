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