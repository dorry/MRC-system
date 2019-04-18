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

  </head>
  <body>

    <?php include("navbar.php"); ?>

<div>
  <h2>Admin Options : Manage Links </h2>
  <a href="createlink.php"> <h3>   - Create a whole new Link </h3></a> 
  <a href="Givelink.php"> <h3>     - Create role permissions </h3></a>
  <a href="Typelinks.php"> <h3>    - Change role permissions </h3></a>
  <a href="deletelink.php"> <h3>  -  Delete link </h3></a>


</div>


<?php include("footer.php"); ?>
    
  </body>
</html>
