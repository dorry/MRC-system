<head>
<?php 
require_once"admincontroller.php";
session_start();
if (empty($_SESSION)) { header("Location:index.php"); }

$id=$_SESSION['ID'];
$c= new admincontroller();
$c->showmyres($id);

include("footer.php"); ?>
  </body>
</html>
