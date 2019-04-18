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
   
    <?php include("navbar.php"); ?>

<div>
  <h2>Profile: </h2>
  <a href="Profile.php"> <h3>   - View Profile </h3></a>
  <a href="EditProfile.php"> <h3>   - Edit Profile </h3></a>
  <a onclick="confirmation()"><h3> - Delete my account</h3></a>

  <!-- <a href="linkCRUD.php"> <h3>   -  Links </h3></a> -->




</div>
  <script>
function confirmation() {
  var r = confirm("Are you sure you want to delete your account ?");
  if (r == true) {
    window.location.href = "DeleteProfile.php";
  } else {
  }
}
</script>

    <?php include("footer.php"); ?>
  
  </body>
</html>
