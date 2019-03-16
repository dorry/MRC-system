<?php
//Not Edited to Object Oriented

session_start();
if(!empty($_SESSION))
{
  
}
else
{
  header("Location:index.php");
}

$i = 0;

if(isset($_POST['eutd_submit'])){
    $R = $_POST['roleid'];
 echo "<script>alert('$R')</script>";

    $U = $_POST['users'];
    echo "<script>alert('$U')</script>";

			}
 ?>