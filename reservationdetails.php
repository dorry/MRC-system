<?php
include"mydatabaseconnection.php";

class reservationdetails
{
public $quantity;
public $radiologyid;
public $reserveid;
public $id;


static function addreservationdetails ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}


static function editreservationdetails ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}

static function deletereservationdetails ($obj)
{
    $DB=new database();
    $conn=$DB->DBC();


}

}
?>