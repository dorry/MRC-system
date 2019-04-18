<?php
//Edited to Object Oriented

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

  
    <title>Accounts list</title>
  </head>
  <body>
 
    <?php include("navbar.php"); 
          include("reservationdetails.php");
    ?>

<div> 

<?php

//   $user = new user();
//   $user->retrive();
$reservationdetails= new reservationdetails();
$reservationdetails->ViewAllReservationForAdmin();
?>
</div>

    <?php include("footer.php"); ?>
  
  </body>
</html>
