<?php
include("user.php");
session_start();
if(!empty($_SESSION))
{

  $ID = $_POST['user'];
  $user = new user();
  $user->id = $ID;
  $user->admindeleteuser($user); 
    header("Location:index.php");


}
else
{
  header("Location:index.php");
}
?>

