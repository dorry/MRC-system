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

$servername = "localhost";
$username = "id8878100_root";
$password = "fz@ayV3V#@2W!Zd^1qwN";
$dbname = "id8878100_mrc";
$conn = mysqli_connect($servername,$username,$password,$dbname);
?>
  <head>

    <!-- Required Meta Tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- Page Title -->
    <title>Accounts list</title>

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



<div>
  <h3> <?php echo 'ID';  echo '     ';  echo 'FName';
echo '     ';  echo 'LName'; echo '     ';  echo 'SSN'; ?></h3>

<?php
  $sql4 = "SELECT  *  FROM `user`";
  $result4 = mysqli_query($conn, $sql4);
  if(mysqli_num_rows($result4) > 0){
     while($row = mysqli_fetch_array($result4))
    {
 ?>

         <h4 value = "<?php echo $row['id'];?>"> <?php echo $row['id'];  echo '     ';  echo $row['firstname'];
echo '     ';  echo $row['lastname']; echo '     ';  echo $row['socialnumber'];
         ?> </h4>  
<?php 
}
?>

<?php
}

?>


</div>


  

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
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/vendor/superfish.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
