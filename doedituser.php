<?php 
include"user.php";



$user = new user();
$user->username = $_POST['UName'];
$user->email= $_POST['email'];
$user->password = $_POST['password'];
$user->id=$_POST['user'];
$user->usertypeid=$_POST['role'];

$user->adminedituser($user);






?>