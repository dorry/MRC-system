
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
  </head>
  <body>
    <!-- Preloader Starts -->
    <!-- Preloader End -->
    <!-- Header Area Starts -->
    <?php include("navbar.php"); ?>
    <!-- Header Area End -->
    <!-- Banner Area Starts -->

<div>
  <h2>Reservation  : </h2>
  <a href="Myreservation.php"> <h3>   - View your current reservations </h3></a>
  <a href="writereport.php"> <h3>   - Write report for patient </h3></a>



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
