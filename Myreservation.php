
<head>
<?php //include"reservationdetails.php";
		require_once"admincontroller.php";
 session_start(); ?>
 
   
    <title>Create Role</title>
  </head>
  <body>

     <?php include("navbar.php"); ?>

     <!-- <form action="admincontroller.php" method="POST"> -->

<?php
$id=$_SESSION['ID'];
$c= new admincontroller();
$c->showmyres($id);
?>
  <!-- </form> -->

    <?php include("footer.php"); ?>

  </body>
</html>
