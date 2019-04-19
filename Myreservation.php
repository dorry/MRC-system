
<head>
<?php //include"reservationdetails.php";
		require_once"usercontroller.php";
 session_start(); ?>
 
   
    <title>Create Role</title>
  </head>
  <body>

     <?php include("navbar.php"); ?>


<?php
$id=$_SESSION['ID'];
$c= new usercontroller();
$c->showmyres($id);

?>
  
    <?php include("footer.php"); ?>

  </body>
</html>
