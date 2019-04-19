<?php
require_once"mydatabaseconnection.php";
include"reservationdetails.php";

class reserve
{
  public $date;
  public $doctorid;
  public $patientid;
  public $id;

static function selectmyres($id){
  $DB=new database();
  $conn=$DB->DBC();
    
  $query = "SELECT * FROM `reserve` WHERE DoctorID = $id or PatientID = $id";
  $result = mysqli_query($conn, $query);
  $i = 0;
  $array;
  if(mysqli_num_rows($result) > 0)
  {
        while($row = mysqli_fetch_array($result))
       {
        $array[$i]=$row;
        $i++;
       }
      return $array;
} 
}
static function selectformyres($id){
  $DB=new database();
  $conn=$DB->DBC();
    
  $query = "SELECT * FROM `reserve` WHERE DoctorID = $id or PatientID = $id";
  $result = mysqli_query($conn, $query);
  $i = 0;
  $array;
  if(mysqli_num_rows($result) > 0)
  {
        while($row = mysqli_fetch_array($result))
       {
        $array[$i]=$row;
        $i++;
       }
      return $array;
} 
}

  public static function selectforviewadmin()
  {
    $DB=new database();
    $conn=$DB->DBC();
    $query = "SELECT * FROM `reserve` WHERE PatientID> '0' and isdeleted = 'false'";
    $result = mysqli_query($conn, $query);
    $i = 0;
    $array;
    if(mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_array($result))
      {
        $array[$i]=$row;
        $i++;
      }
    return $array;
    }
  } 

  public static function reserveadddropdopselectdoctor()
  {
    $DB=new database();
    $conn=$DB->DBC();
    $selectDocs = "select * from user where usertypeid like
    (select id from usertype where type = 'Doktor')";
    $result = mysqli_query($conn, $selectDocs);
    $i = 0;
    if(mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_assoc($result))
      {
        $array[$i] = $row;
        $i++; 
      }
      return $array;
    }
  }

  public static function reserveadddropdopselectradiology()
  {
    $DB=new database();
    $conn=$DB->DBC();
    $selectRad = " select * from radiology where isdeleted = 'false'";
    $result = mysqli_query($conn, $selectRad);
    $i=0;
    if(mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_assoc($result))
      {
        $array[$i] = $row;
        $i++; 
      }
      return $array;
    }
  }

  public static function addreserve ($obj)
  {
    $DB=new database();
    $conn=$DB->DBC();
    $insertReserve = "insert into reserve (PatientID , DoctorID, Date) values ($obj->patientId, $obj->doctorId,'$obj->date')";
    mysqli_query($conn,$insertReserve);
    $lastidreserved=mysqli_insert_id($conn);
    $reservationdetails=new reservationdetails();
    $reservationdetails->addreservationdetails($lastidreserved);
    //header("Location:index.php");
    //echo"<script>alert('after here')</script>";
  }

  public static function editreserve ($obj,$obj1)
  {
    $DB=new database();
    $conn=$DB->DBC();
    $sql1 = "UPDATE reservationdetails 
            SET RadiologyID='$obj1->radiologyid'
            WHERE ReserveID='$obj1->id'";
    $sql= "UPDATE reserve
          SET DoctorID = '$obj->doctorid' , Date = '$obj->date' 
          WHERE ID  = '$obj1->id' ";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    header("Location:ReservationCRUD.php");
  }

  static function deletereserve($obj)
  {
    $DB=new database();
    $conn=$DB->DBC();
  }
}
?>