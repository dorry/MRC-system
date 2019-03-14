<?php
 //include"mydatabaseconnection.php";

class reservationdetails
{
public $quantity;
public $radiologyid;
public $reserveid;
public $id;


public static function addreservationdetails ($lastidreserved)
{
    $DB=new database();
    $conn=$DB->DBC();
    
    $reserveDetails->reserveId=$lastidreserved;
    $reserveDetails->radiologyId=$_POST['radiology'];
    $reserveDetails->quantity=1;
    //echo"<script>alert($conn)</script>";

  //$reserveDetails = new reservationDetails( mysqli_insert_id($conn),$_POST['radiology'],1);
  $insertReserveDet = "insert into reservationdetails (ReserveID , RadiologyID, quantity) values ($reserveDetails->reserveId, $reserveDetails->radiologyId,$reserveDetails->quantity)";
  mysqli_query($conn,$insertReserveDet);

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