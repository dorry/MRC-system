
<?php//Not Edited to Object Oriented

   session_start();
class reservation{
 
    public $patientId;
    public $doctorId;
    public $date;
   
    public function __construct($patientId,$doctorId,$date){
        $this->patientId = $patientId;
        $this->doctorId = $doctorId;
        $this->date = $date;
      
        
    }
  }
  class reservationDetails{
    
    public $reserveId;
    public $radiologyId;
    public $quantity;
    
   
    public function __construct($reserveId,$radiologyId,$quantity){
        $this->reserveId = $reserveId;
        $this->radiologyId = $radiologyId;
        $this->quantity = $quantity;
      
        
    }
  }
  $servername = "localhost";
  $username = "id8878100_root";
  $password = "fz@ayV3V#@2W!Zd^1qwN";
  $dbname = "id8878100_mrc";
  $conn = mysqli_connect($servername,$username,$password,$dbname);
  if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
  $selectDocs = "select * from user where usertypeid like (select id from usertype where type = 'Doctor')";
  $result = mysqli_query($conn, $selectDocs);
  echo "<form  method='post'> ";
  echo" choose doctor:";
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
    echo" choose radiology type:";
  echo "<select name = 'radiology'>";

      while($row = mysqli_fetch_assoc($result)){
        echo "<option value='" . $row['ID'] . "'>" . $row['Name'] . "</option>";
      }
      echo "</select>";
  }
  echo"<br> Reservation date:";
  echo"<br> <input type='text' name = 'day' placeholder = 'day'/>";
  echo"<input type='text' name = 'month' placeholder = 'month'/>";
  echo"<input type='text' name = 'year' placeholder = 'year'/>";
  echo"<input type='text' name = 'hours' placeholder = 'hours'/>";
  echo"<input type='text' name = 'mins' placeholder = 'mins'/>";


echo " <br> <a href='Myreservation.php'>My Reservation<a>";
 echo " <br> <input type='submit' name='submit' />";
 if(isset($_POST['submit'])){
     
$reserve = new reservation($_SESSION['ID'],$_POST['doctor'],$_POST['year']."-".$_POST['month']."-".$_POST['day']." ".$_POST['hours'].":".$_POST['mins'].":00");
$insertReserve = "insert into reserve (PatientID , DoctorID, Date) values ($reserve->patientId, $reserve->doctorId,'$reserve->date')";
mysqli_query($conn,$insertReserve);
$reserveDetails = new reservationDetails( mysqli_insert_id($conn),$_POST['radiology'],1);
$insertReserveDet = "insert into reservationdetails (ReserveID , RadiologyID, quantity) values ($reserveDetails->reserveId, $reserveDetails->radiologyId,$reserveDetails->quantity)";
mysqli_query($conn,$insertReserveDet);

 }







?>