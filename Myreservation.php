
<head>
<?php //include"reservationdetails.php";
		require_once"admincontroller.php";
 session_start(); ?>
 
   
    <title>Create Role</title>
  </head>
  <body>

     <?php include("navbar.php"); ?>


<?php
$id=$_SESSION['ID'];
$c= new admincontroller();
$c->showmyres($id);
?>
  
    <?php include("footer.php"); ?>

  </body>
</html>
