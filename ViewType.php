<?php
//Edited to Object Oriented
session_start();
if (empty($_SESSION)) { header("Location:index.php"); }

?>
  <head>

    <
    <title>Usertypes list</title>

   
  </head>
  <body>
    <?php require_once("navbar.php");
          require_once("admincontroller.php")
    ?>
<div>
  <h3> Usertype List </h3>
<?php 
$usertype = new admincontroller();
$usertype->viewtypes();
?>

</div>

    <?php include("footer.php"); ?>
  
  </body>
</html>
