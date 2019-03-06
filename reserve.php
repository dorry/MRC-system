<?php
include"mydatabaseconnection.php";

class reserve
{
public $date;
public $doctorid;
public $patientid;
public $id;


static function addreserve ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}


static function editreserve ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}

static function deletereserve($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}




}
?>