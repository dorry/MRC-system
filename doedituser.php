<?php 
include"user.php";

$password = $_POST['password'];
$encrpassword = sha1($password);

$user = new user();
$user->username = $_POST['UName'];
$user->email= $_POST['email'];
$user->password = $encrpassword
$user->id=$_POST['user'];
$user->usertypeid=$_POST['role'];

$user->adminedituser($user);






?>