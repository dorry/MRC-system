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

    <title>Admin Panel</title>

  </head>
  <body>
    <?php include("navbar.php");
     include("user.php"); ?>
    
<div>
  <h2>View Profile: </h2>
<?php  
$user= new user();
$user->RetrieveProfileForUser();

?>


</div>

  <?php include("footer.php"); ?>
    
  </body>
</html>
