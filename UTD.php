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
    <title>Manage Usertype Details</title>
  </head>
  <body>
    <?php include("navbar.php"); ?>
<div>
  <h2>Admin Options : Manage Usertype detailss </h2>
<a href="createoption.php"> <h3>   - Create Option </h3></a>
<a href="deleteoption.php"> <h3>   - Delete Option </h3></a>
<a href="editoption.php"> <h3>   - Edit Option </h3></a>
<a href="addoption.php"> <h3>   - Add option to Usertype </h3></a>
<a href="modifyuser.php"> <h3>   - Add Usertype details to a certain user </h3></a>
<a href="editUTD.php"> <h3>   - Edit Usertype details of a certain user </h3></a>



</div>


    <?php include("footer.php"); ?>

  </body>
</html>
