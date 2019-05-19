<?php
session_start();
if (empty($_SESSION)) { header("Location:index.php"); }
?>
  <head>

  </head>
  <body>
  
    <?php include("navbar.php"); 
    require_once"admincontroller.php";
    $c = new admincontroller();
    $c->showuserCRUD();
    ?>
    
<div>
  <h2>Reservation  : </h2>
  <a href="CreateReserve.php"> <h3>   - Make a new Reservation </h3></a>
  <a href="Myreservation.php"> <h3>   - View/Delete your current reservations </h3></a>
  <a href="showreportpat.php"> <h3>   - View your current reports </h3></a>



</div>



    <?php include("footer.php"); ?>

  </body>
</html>
