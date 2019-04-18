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

    <title>Radiology list</title>
  </head>
  <body>
    <?php include("navbar.php");
          require_once("radiologycontroller.php");
          require_once("radiology.php");
    ?>
<div>
  <h3> Radiology List </h3>
<?php 
$rad = new radiologycontroller();
$rad->viewradiologytable();
?>

</div>

  
    <?php include("footer.php"); ?>

  </body>
</html>
