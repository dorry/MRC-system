<head>
<?php 
require_once"admincontroller.php";
if (!isset($_SESSION)) {session_start();}
if (empty($_SESSION)) { header("Location:index.php"); }

$id=$_SESSION['ID'];
$c= new admincontroller();
$c->showmyres($id);

include("footer.php"); ?>
  </body>
</html>
