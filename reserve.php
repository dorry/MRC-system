<?php
require_once"mydatabaseconnection.php";
require_once"reservationdetails.php";
require_once"Interfaces.php";
require_once"notifications.php";
class reserve implements ISubject
{
  public $date;
  public $doctorid;
  public $patientid;
  public $id;
  private $arr;
  public function __construct()
  {
    $this->arr= array();
  }
  public function add($obj)
  {
     array_push($this->arr, $obj);
  }
  public  function notify()
  {
    $DB=database::getinstance();  
    $result =$DB->query("notifications","isviewed = false");
    $i = 0;
      while($row = mysqli_fetch_array($result))
   {
        $array[$i]=$row;
        $i++;
   }
   if($i!=0){
    foreach($this->arr as $a)
    {
      $a->update($array);
    }
  }
  }
static function selectmyres($id){
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
   if($i>0){return $array;}
   else {return;}
   
   }
static function selectformyres($id){
  $DB=database::getinstance();  
  $result =$DB->query("reserve"," DoctorID = $id or PatientID = $id AND isdeleted = 'false'");
  $i = 0;
  $array;

        while($row = mysqli_fetch_array($result))
       {
        $array[$i]=$row;
        $i++;
       }
      return $array;} 
  public static function selectforviewadmin(){
    $DB=database::getinstance();
    $result = $DB->query("reserve", "PatientID>'0' and isdeleted='false'");
    $i = 0;
    $array;
      while($row = mysqli_fetch_array($result))
      {
        $array[$i]=$row;
        $i++;
      }
    return $array;} 

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
public static function reserveadddropdopselectradiology(){
    $DB=database::getinstance();
    $selectRad = " select * from radiology where isdeleted = 'false'";
    $result = $DB->query("radiology", "isdeleted = 'false'");
    $i=0;
      while($row = mysqli_fetch_assoc($result))
      {
        $array[$i] = $row;
        $i++; 
      }
      return $array;}
public static function addreserve ($obj){
    $DB=database::getinstance();
    $lastidreserved = $DB->insertlast("reserve","PatientID , DoctorID, Date",
                         "'$obj->patientId', '$obj->doctorId','$obj->date'");
    $reservationdetails=new reservationdetails();
    $reservationdetails->addreservationdetails($lastidreserved);
    $notification = new notifications();
    $notification->addresnot($lastidreserved , $obj->doctorId, $obj->patientId);
    //header("Location:index.php");
    //echo"<script>alert('after here')</script>"; 
}  
static function deletereserve($obj)
{
    $DB=new database();
    $conn=$DB->DBC();
}


}
?>