<?php
session_start();
if(!empty($_SESSION))
{
  
}
else
{
  header("Location:index.php");
}
require_once "doctor.php";
require_once "doctorcontroller.php";
?>
  <head>
  </head>
  <body>
    <!-- Preloader Starts -->
    <!-- Preloader End -->
    <!-- Header Area Starts -->
    <?php include("navbar.php"); ?>
    <!-- Header Area End -->
    <!-- Banner Area Starts -->

<div>
  <h2>Report : </h2>
  <br>
  <?php
  $doc = new doctorcontroller();
  $doc->viewreport($_GET['id'],$_SESSION['ID']);

  ?>
</div>


  

    <!-- Banner Area End -->
    <!-- Welcome Area Starts -->
    <!-- Welcome Area End -->
    <!-- Patient Area Starts -->
    <!-- Patient Area Starts -->




    <!-- Footer Area Starts -->
    <?php include("footer.php"); ?>
    <!-- Footer Area End -->
    <!-- Javascript -->
  </body>
</html>
