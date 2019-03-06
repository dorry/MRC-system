<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!empty($_SESSION))
{
  
}
else
{
  header("Location:index.php");
}
?>
  <head>

    <style type="text/css">@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);
*:focus {
  outline: none;
}

body {
  margin: 0;
  padding: 0;
  font-size: 16px;
  color: #222;
  font-family: 'Roboto', sans-serif;
  font-weight: 300;
}

#login-box {
  position: relative;
  margin: 5% auto;
  width: 600px;
  height: 700px;
  border-radius: 2px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
}

.left {
  position: absolute;
  top: 0;
  left: 0;
  box-sizing: border-box;
  padding: 40px;
  width: 600px;
  height: 400px;
}

h1 {
  margin: 0 0 20px 0;
  font-weight: 300;
  font-size: 28px;
}

input[type="text"],
input[type="password"] {
  display: block;
  box-sizing: border-box;
  margin-bottom: 20px;
  padding: 4px;
  width: 220px;
  height: 32px;
  border: none;
  border-bottom: 1px solid #AAA;
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
  font-size: 15px;
  transition: 0.2s ease;
}

input[type="text"]:focus,
input[type="password"]:focus {
  transition: 0.2s ease;
}

input[type="submit"] {
  margin-top: 28px;
  width: 120px;
  height: 32px;
  background:  linear-gradient(to right, #244cfd, #15e4fd);
  border: none;
  border-radius: 2px;
  color: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  text-transform: uppercase;
  transition: 0.1s ease;
  cursor: pointer;
}

input[type="submit"]:hover,
input[type="submit"]:focus {
  opacity: 0.8;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

input[type="submit"]:active {
  opacity: 1;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

.or {
  position: absolute;
  top: 180px;
  left: 280px;
  width: 40px;
  height: 40px;
  background: #DDD;
  border-radius: 50%;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  line-height: 40px;
  text-align: center;
}

.right {
  position: absolute;
  top: 0;
  right: 0;
  box-sizing: border-box;
  padding: 40px;
  width: 300px;
  height: 400px;
  background: url('https://goo.gl/YbktSj');
  background-size: cover;
  background-position: center;
  border-radius: 0 2px 2px 0;
}

.right .loginwith {
  display: block;
  margin-bottom: 40px;
  font-size: 30px;
  color: black;
  text-align: center;
  font-weight: bold;
}

button.social-signin {
  margin-bottom: 20px;
  width: 220px;
  height: 36px;
  border: none;
  border-radius: 2px;
  color: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  transition: 0.2s ease;
  cursor: pointer;
}

button.social-signin:hover,
button.social-signin:focus {
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.2s ease;
}

button.social-signin:active {
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.2s ease;
}

button.social-signin.facebook {
  background: #32508E;
}

button.social-signin.twitter {
  background: #55ACEE;
}

button.social-signin.google {
  background: #DD4B39;
}</style>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- Page Title -->
    <title>Create Role</title>

    <!-- Favicon -->
    <link
      rel="shortcut icon"
      href="assets/images/logo/favicon.png"
      type="image/x-icon"
    />

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css" />
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css" />
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css" />
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css" />
    <link rel="stylesheet" href="assets/css/linearicons.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <!-- Preloader Starts -->
    <div class="preloader">
      <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
    <?php include("navbar.php"); ?>
    <!-- Header Area End -->

    <!-- Banner Area Starts -->
    <section class="banner-area other-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">


<?php
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
  echo"<br> <input type='text' name = 'day' placeholder = 'day'/>";
  echo"<input type='text' name = 'month' placeholder = 'month'/>";
  echo"<input type='text' name = 'year' placeholder = 'year'/>";
  echo"<input type='text' name = 'hours' placeholder = 'hours'/>";
  echo"<input type='text' name = 'mins' placeholder = 'mins'/>";

 echo " <br> <input type='submit' name='submit' />";
echo "</div>";
echo "</div>";
 if(isset($_POST['submit'])){
     
$reserve = new reservation($_SESSION['ID'],$_POST['doctor'],$_POST['year']."-".$_POST['month']."-".$_POST['day']." ".$_POST['hours'].":".$_POST['mins'].":00");
$insertReserve = "insert into reserve (PatientID , DoctorID, Date) values ($reserve->patientId, $reserve->doctorId,'$reserve->date')";
mysqli_query($conn,$insertReserve);
$reserveDetails = new reservationDetails( mysqli_insert_id($conn),$_POST['radiology'],1);
$insertReserveDet = "insert into reservationdetails (ReserveID , RadiologyID, quantity) values ($reserveDetails->reserveId, $reserveDetails->radiologyId,$reserveDetails->quantity)";
mysqli_query($conn,$insertReserveDet);

 }







?>


  

          </div>
        </div>
      </div>
    </section>
    <!-- Banner Area End -->
    <!-- Welcome Area Starts -->
    <!-- Welcome Area End -->
    <!-- Patient Area Starts -->
    <!-- Patient Area Starts -->




    <!-- Footer Area Starts -->
    <?php include("footer.php"); ?>
    <!-- Footer Area End -->

    <!-- Javascript -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="assets/js/vendor/superfish.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
