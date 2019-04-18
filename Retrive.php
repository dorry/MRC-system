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
<title>Accounts list</title>
</head>
  <body>
     <?php include("navbar.php"); 
          require_once("user.php");
          require_once("usercontroller.php");
      ?>
<div> 

<?php

  $c = new usercontroller();
  $c->view();
?>
</div>
    <?php include("footer.php"); ?>
  </body>
</html>
