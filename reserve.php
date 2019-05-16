<?php
require_once"mydatabaseconnection.php";
require_once"reservationdetails.php";
require_once"Interfaces.php";
require_once"notifications.php";
require_once"notification.php";
require_once"rnoti.php";
class reserve 
{
  public $date;
  public $doctorid;
  public $patientid;
  public $id;

  static function selectpatientresforinvoice($pid)
  {
    $DB=database::getinstance();  
    $result = $DB->query("reserve", "isdeleted = 'false' and PatientID = '$pid' ");
    $i = 0;
    while($row = mysqli_fetch_array($result))
    {
      $array[$i]=$row;
      $i++;
    }
    if($i != 0)
    {
      return $array;
    }
  }

  static function showpatientswithreserves()
  {
    $DB=database::getinstance();  
    $i = 0;
    $result4 = $DB->query("reserve", "isdeleted = 'false'");
    while($row = mysqli_fetch_array($result4))
    {
      $array[$i]=$row;
      $i++;
    }
    if($i != 0)
    {
      return $array;
    }
  }

  static function selectmyres($id)
  {
    $DB=database::getinstance();  
    $result =$DB->query("reserve"," DoctorID = $id or PatientID = $id AND isdeleted = 'false'");
    $i = 0;
    $array;
    while($row = mysqli_fetch_array($result))
    {
      $array[$i]=$row;
      $i++;
    }
      // echo "<h1> $i </h1>";
    if($i>0)
    {
      return $array;
    }
    else 
    {
      return;
    }
  }

  static function selectformyres($id)
  {
    $DB=database::getinstance();  
    $result =$DB->query("reserve"," DoctorID = $id or PatientID = $id AND isdeleted = 'false'");
    $i = 0;
    $array;
    while($row = mysqli_fetch_array($result))
    {
      $array[$i]=$row;
      $i++;
    }
    return $array;
  }

  public static function selectforviewadmin()
  {
    $DB=database::getinstance();
    $result = $DB->query("reserve", "PatientID>'0' and isdeleted='false'");
    $i = 0;
    $array;
    while($row = mysqli_fetch_array($result))
    {
      $array[$i]=$row;
      $i++;
    }
    return $array;
  } 

  public static function reserveadddropdopselectdoctor()
  {
    $DB=database::getinstance();
    $result = $DB->query("user", "usertypeid like
    (select id from usertype where type = 'Doctor') AND isdeleted = 'false'");
    $i = 0;
    while($row = mysqli_fetch_assoc($result))
    {
      $array[$i] = $row;
      $i++; 
    }
    return $array;
  }

  public static function reserveadddropdopselectspecificdoctor($obj)
  {
    $DB=database::getinstance();
    $result = $DB->query("`schedule`,`user`", "schedule.isdeleted = 'false' AND '$obj' BETWEEN StartTime AND EndTime AND schedule.DocId=user.id" );
    $i = 0;
    while($row = mysqli_fetch_assoc($result))
    {
      $array[$i] = $row;
      $i++; 
    }
    return $array;
  }
  // public static function doctorsavailable($obj)
  // {
  //     $DB=database::getinstance();
  //     $result = $DB->query("user","id='$obj' isdeleted = 'false'" );
  //     $i = 0;
  //       while($row = mysqli_fetch_assoc($result))
  //       {
  //         $array[$i] = $row;
  //         $i++; 
  //       }
  //       return $array;
  // }
  public static function reserveadddropdopselectradiology()
  {
    $DB=database::getinstance();
    $result = $DB->query("radiology", "isdeleted = 'false'");
    $i=0;
    while($row = mysqli_fetch_assoc($result))
    {
      $array[$i] = $row;
      $i++; 
    }
    return $array;
  }
  public static function addreserve ($obj)
  {
    $datevalidate = "";
    $DB=database::getinstance();
    $result = $DB->query("reserve", "isdeleted='false' and date ='$obj->date'");
    if(mysqli_num_rows($result)>0)
    {
      $datevalidate = "Can't make a reservation on the same date.";
      header("Location:CreateReserve.php");
	  }
    else
    {
      $DB=database::getinstance();
      $lastidreserved = $DB->insertlast("reserve","PatientID , DoctorID, Date","'$obj->patientId', '$obj->doctorId','$obj->date'");
      $reservationdetails=new reservationdetails();
      $reservationdetails->addreservationdetails($lastidreserved);
      $notification = new notification();
      $notification->addnotification($obj->patientId,$obj->doctorId);
    }
  }  
  static function deletereserve($obj)
  {
    $DB=new database();
    $conn=$DB->DBC();
  }
}
?>