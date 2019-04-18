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
  <title>Role Managment</title>
  </head>
  <body>
 
    <?php include("navbar.php"); ?>
<div>
  <h2>Admin Options : Manage Usertypes </h2>
<a href="ViewType.php"> <h3>   - View all Roles </h3></a>
<a href="createtype.php"> <h3>   - Create a new Role </h3></a>
<a href="edittype.php"> <h3>   - Edit an existing Role </h3></a>
<a href="deleteusertype.php"> <h3>   - Delete a Role </h3></a>
</div>
    <?php include("footer.php"); ?>

  </body>
</html>
