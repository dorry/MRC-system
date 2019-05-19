<?php
session_start();
if (!isset($_SESSION)) { header("Location:index.php"); }if (empty($_SESSION)) { header("Location:index.php"); }require_once "admincontroller.php";
include("navbar.php"); 

?>
  <div>
<h2>Admin Options : Manage Users </h2>
  <a href="Retrive.php"> <h3>   - Retrive/Edit Data of all accounts </h3></a>
  <a href="deleteuser.php"> <h3>   - Delete an account </h3></a>
   </div>
<?php
$admin = new admincontroller();
$admin->showuserCRUD();



include("footer.php"); 
?>