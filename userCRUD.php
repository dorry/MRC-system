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
  <h2>Admin Options : Manage Users </h2>
  <a href="Retrive.php"> <h3>   - Retrive/Edit Data of all accounts </h3></a>
  <!-- <a href="edituser.php"> <h3>   - Edit basic data of an account </h3></a> -->
  <a href="deleteuser.php"> <h3>   - Delete an account </h3></a>

</div>

    <?php include("footer.php"); ?>

  </body>
</html>
