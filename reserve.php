<?php
require_once"mydatabaseconnection.php";
include"reservationdetails.php";

class reserve
{
public $date;
public $doctorid;
public $patientid;
public $id;

public static function addreserve ()
{
    $DB=new database();
    $conn=$DB->DBC();

    $selectDocs = "select * from user where usertypeid like
     (select id from usertype where type = 'doctor')";
    $result = mysqli_query($conn, $selectDocs);
    echo "<form  method='post'> ";
      echo "<div id='login-box'>";
      echo "<div class='left'>";
  
    echo" <h2> Make a reservation: </h2>";
    echo" <h4> Choose doctor: </h4>";
    if(mysqli_num_rows($result) > 0){
    echo "<select name = 'doctor'>";
  
        while($row = mysqli_fetch_assoc($result)){
          echo "<option value='" . $row['id'] . "'> Dr. " . $row['firstname'] . " " .$row['lastname'] . "</option>";
        }
        echo "</select>";
    }
  
    $selectRad = " select * from radiology";
    $result = mysqli_query($conn, $selectRad);
    if(mysqli_num_rows($result) > 0){
      echo" <h4>Choose radiology type: </h4>";
    echo "<select name = 'radiology'>";
  
        while($row = mysqli_fetch_assoc($result)){
          echo "<option value='" . $row['ID'] . "'>" . $row['Name'] . "</option>";
        }
        echo "</select>";
    }
    echo"<br> Reservation date:";
    echo"<br> <input type='date' name = 'dob'/><br>";
    echo"<br> <input type='time' name = 'Time'/>";
  
   echo " <br> <input type='submit' name='addreserve' />";
  echo "</div>";
  echo "</div>";
   if(isset($_POST['addreserve'])){
  $reserve->patientId=$_SESSION['ID'];
  $reserve->doctorId=$_POST['doctor'];
  $reserve->date=$_POST['dob']." ".$_POST['Time'].":00";
  $insertReserve = "insert into reserve (PatientID , DoctorID, Date) values ($reserve->patientId, $reserve->doctorId,'$reserve->date')";
  mysqli_query($conn,$insertReserve);
  $lastidreserved=mysqli_insert_id($conn);
  $reservationdetails=new reservationdetails();
  $reservationdetails->addreservationdetails($lastidreserved);
  //header("Location:index.php");
  //echo"<script>alert('after here')</script>";

   }

}


static function editreserve ($obj,$obj1)
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