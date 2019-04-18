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
    <title>Radiology</title>
  </head>
  <body>
    <?php include("navbar.php"); ?>
  
<div>
  <h2>Admin Options : Manage Radiologies </h2>
<a href="viewradiology.php"> <h3>   - View all Radiologies </h3></a>
<a href="createrad.php"> <h3>   - Create a new Radiology </h3></a>
<a href="editrad.php"> <h3>   - Edit an existing Radiology </h3></a>
<a href="deleterad.php"> <h3>   - Delete a Radiology </h3></a>



</div>
    <?php include("footer.php"); ?>
  </body>
</html>
