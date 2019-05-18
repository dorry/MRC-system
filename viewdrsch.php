<?php
session_start();
if(!empty($_SESSION)){}
else{header("Location:index.php");}
?>
  <head>
<title>Accounts list</title>
  </head>
  <body>
    <?php include("navbar.php"); 
         // require_once("reservationdetails.php");
          require_once("admincontroller.php");
    ?>
<div> 

<?php
$c= new admincontroller();
$c->showdoctorsch();
?>
</div>
    <?php include("footer.php"); ?>
  
  </body>
</html>
