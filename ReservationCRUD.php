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

    <title>Admin Panel</title>
  </head>
  <body>
  <?php include("navbar.php"); ?>
  


<div>
  <h2>Admin Options : Manage Reservation </h2>
  <a href="ViewAllReservation.php"> <h3>   - Retrive All Reservation </h3></a>
  <a href="editreservation.php"> <h3>   - Edit Reservation </h3></a>
  <a href="DeleteReservation.php"> <h3>   - Delete Reservation </h3></a>

</div>

    <?php include("footer.php"); ?>
  </body>
</html>
