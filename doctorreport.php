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

  </head>
  <body>
  
    <?php include("navbar.php"); ?>
<div>
  <h2>Reports  : </h2>
  <a href="createreportdoctor.php"> <h3>   - Create a report for a patient </h3></a>
  <a href="showreportdoctor.php"> <h3>   - View your current reports </h3></a>



</div>



    <?php include("footer.php"); ?>

  </body>
</html>
