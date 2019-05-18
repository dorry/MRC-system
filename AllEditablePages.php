<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (empty($_SESSION)) { header("Location:index.php"); }
?>
  <head>
    <title>Admin Panel</title>
    </div>
    <?php include("navbar.php"); ?>
<div>
  <h2> All Editable Pages Available : </h2>
  <a href="editabout.php"> <h3>   - About us page </h3></a>
</div>
    <?php include("footer.php"); ?>
  </body>
</html>
