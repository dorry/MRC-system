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

    <!-- Page Title -->
    <title>Admin Panel</title>

    <!-- Favicon -->
      <!-- CSS Files -->
  </head>
  <body>
    <!-- Preloader Starts -->
    <!-- Preloader End -->
    <!-- Header Area Starts -->
    <?php include("navbar.php"); ?>
    <!-- Header Area End -->




<div>
  <h2>Admin Options : </h2>
  <a href="userCRUD.php"> <h3>   - Manage Users </h3></a>
  <a href="Roles.php"> <h3>   - Manage Usertypes </h3></a>
  <a href="linkCRUD.php"> <h3>   - Manage Links </h3></a>
  <a href="UTD.php"> <h3>   - Manage Usertype details </h3></a>
  <a href="radiologyCRUD.php"> <h3>   - Manage Radiologies </h3></a>
  <a href="ReservationCRUD.php"> <h3>   - Manage Reservation </h3></a>
  <a href="AllEditablePages.php"> <h3>   - Editable pages </h3></a>
  <a href="Statistics.php"> <h3>   - Statistics page </h3></a>
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
